<?php
$ldap_host = getenv('LDAP_HOST') ?: (isset($_SERVER['HTTP_HOST']) ? explode(':', $_SERVER['HTTP_HOST'])[0] : 'openldap');
$ldap_port = getenv('LDAP_PORT') ?: 389;
$ldap_admin_dn = getenv('LDAP_ADMIN_DN') ?: 'cn=admin,dc=g2cloud,dc=com';
$ldap_admin_password = getenv('LDAP_ADMIN_PASSWORD') ?: 'altere_sua_senha_admin';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $url = 'ldap://' . $ldap_host;
    $ldapconn = ldap_connect($url, (int)$ldap_port) or die("Não foi possível conectar ao servidor LDAP em " . htmlspecialchars($ldap_host));
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

    $ldapbind = @ldap_bind($ldapconn, $ldap_admin_dn, $ldap_admin_password);
    if (!$ldapbind) {
        die("Não foi possível autenticar no servidor LDAP. Verifique as credenciais de administração em ambiente.");
    }

    $base_dn = getenv('LDAP_BASE_DN') ?: 'dc=g2cloud,dc=com';
    $dn = "cn=" . $_POST["cn"] . ",ou=People," . $base_dn;

    $info["objectClass"][0] = "inetOrgPerson";
    $info["givenName"] = $_POST["givenName"];
    $info["sn"] = $_POST["sn"];
    $info["mail"] = $_POST["mail"];
    $info["cn"] = $_POST["cn"];
    $info["userPassword"] = $_POST["userPassword"];

    $r = @ldap_add($ldapconn, $dn, $info);

    if ($r) {
        echo "<h3 style='color:green;'>Usuário criado com sucesso!</h3>";
        $server_name = $_SERVER['HTTP_HOST'];
        $streama_url = 'http://' . $server_name . ':8080';
        echo "<p><a href='" . htmlspecialchars($streama_url) . "'>Clique aqui para fazer login no Streama</a></p>";
    } else {
        echo "<h3 style='color:red;'>Erro ao criar o usuário: " . htmlspecialchars(ldap_error($ldapconn)) . "</h3>";
    }

    ldap_close($ldapconn);
}
?>
