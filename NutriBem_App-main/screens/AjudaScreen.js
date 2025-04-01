import React from "react";
import { StatusBar } from "expo-status-bar";
import {
  StyleSheet,
  View,
  Text,
  ScrollView,
  Button,
  Linking,
} from "react-native";

export default function AjudaScreen() {
  return (
    <ScrollView style={styles.container}>
      <View style={styles.section}>
        <Text style={styles.title}>Bem-vindo à Tela de Ajuda!</Text>
        <Text style={styles.text}>
          Este aplicativo foi desenvolvido para te ajudar a gerenciar suas
          receitas e informações financeiras de forma simples e eficiente.
        </Text>
      </View>

      {/* Seção de Login e Cadastro */}
      <View style={styles.section}>
        <Text style={styles.subtitle}>Como fazer Login ou Cadastro</Text>
        <Text style={styles.text}>
          Você pode fazer login ou cadastro utilizando um e-mail e senha ou suas
          contas do Google ou Apple. Basta escolher a opção de sua preferência
          na tela inicial.
        </Text>
        <Text style={styles.text}>
          Se você se cadastrar com o Google ou Apple, sua conta será criada
          automaticamente, e você poderá acessar o app sem precisar lembrar uma
          senha.
        </Text>
      </View>

      {/* Seção de Home */}
      <View style={styles.section}>
        <Text style={styles.subtitle}>Tela Inicial (Home)</Text>
        <Text style={styles.text}>
          Após o login, você será redirecionado para a tela inicial, onde poderá
          acessar as seguintes opções:
        </Text>
        <Text style={styles.text}>
          - **Receitas**: Visualize e adicione suas receitas favoritas.
        </Text>
        <Text style={styles.text}>
          - **Notificações**: Toque no ícone de notificações para ver alertas e
          atualizações do aplicativo.
        </Text>
        <Text style={styles.text}>
          - **Configurações**: Acesse suas preferências e configurações de
          conta.
        </Text>
      </View>

      {/* Seção de Notificações */}
      <View style={styles.section}>
        <Text style={styles.subtitle}>Como usar as Notificações</Text>
        <Text style={styles.text}>
          O aplicativo envia notificações para lembrar de ações importantes,
          como novas receitas ou mudanças nas configurações. Você pode habilitar
          ou desabilitar notificações nas configurações do app.
        </Text>
        <Text style={styles.text}>
          Para visualizar notificações, toque no ícone de sino localizado na
          parte superior direita da tela principal.
        </Text>
      </View>

      {/* Seção de Receitas */}
      <View style={styles.section}>
        <Text style={styles.subtitle}>Como adicionar uma Receita</Text>
        <Text style={styles.text}>
          Para adicionar uma nova receita, vá para a tela de "Receitas" e clique
          no botão de adição (+). Preencha os campos obrigatórios, como nome,
          ingredientes e modo de preparo.
        </Text>
        <Text style={styles.text}>
          As receitas serão salvas em seu perfil para fácil acesso.
        </Text>
      </View>

      {/* Seção de Contato e Suporte */}
      <View style={styles.section}>
        <Text style={styles.subtitle}>Precisa de Ajuda?</Text>
        <Text style={styles.text}>
          Se você encontrar algum problema ou tiver dúvidas, nossa equipe de
          suporte está pronta para ajudar!
        </Text>
        <Text style={styles.text}>
          Você pode entrar em contato conosco por e-mail ou pelo nosso suporte
          online.
        </Text>
        <Button
          title="Enviar um e-mail"
          onPress={() => Linking.openURL("mailto:support@app.com")}
        />
      </View>
      <StatusBar style="auto" />
    </ScrollView>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    padding: 16,
  },
  section: {
    marginBottom: 20,
  },
  title: {
    fontSize: 24,
    fontWeight: "bold",
    marginBottom: 10,
  },
  subtitle: {
    fontSize: 20,
    fontWeight: "600",
    marginBottom: 5,
  },
  text: {
    fontSize: 16,
    lineHeight: 24,
    marginBottom: 10,
  },
});
