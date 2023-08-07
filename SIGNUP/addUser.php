<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ldapconn = ldap_connect("ldap://127.0.0.1", 389) or die("Não foi possível conectar ao servidor LDAP.");
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

    $ldapbind = ldap_bind($ldapconn, "cn=admin,dc=g2cloud,dc=com", "admin") or die("Não foi possível autenticar com o servidor LDAP.");

    $dn = "cn=" . $_POST["cn"] . ",ou=People,dc=g2cloud,dc=com";

    $info["objectClass"][0] = "inetOrgPerson";
    $info["givenName"] = $_POST["givenName"];
    $info["sn"] = $_POST["sn"];
    $info["mail"] = $_POST["mail"];
    $info["cn"] = $_POST["cn"];
    $info["userPassword"] = $_POST["userPassword"];

    $r = ldap_add($ldapconn, $dn, $info);

    if ($r) {
        echo "Usuário criado com sucesso!";
    } else {
        echo "Erro ao criar o usuário: " . ldap_error($ldapconn);
    }

    ldap_close($ldapconn);
}
?>
