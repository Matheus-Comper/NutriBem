import React from "react";
import {
  View,
  Text,
  StyleSheet,
  TextInput,
  TouchableOpacity,
  ScrollView,
  KeyboardAvoidingView,
  Platform,
} from "react-native";
import AntDesign from "@expo/vector-icons/AntDesign";

export default function LoginScreen({ navigation }) {
  return (
    <KeyboardAvoidingView
      style={styles.container}
      behavior={Platform.OS === "ios" ? "padding" : undefined}
    >
      <ScrollView
        contentContainerStyle={styles.scrollViewContent}
        keyboardShouldPersistTaps="handled"
      >
        <Text style={styles.textBemVindo}>Bem vindo de volta</Text>
        <Text style={styles.textDadosUser}>
          Insira as informações abaixo para acessar sua conta
        </Text>
        <View style={styles.formsContainer}>
          <Text style={styles.inputLabel}>Login</Text>
          <TextInput
            style={styles.inputLogin}
            placeholder="Digite seu email"
            keyboardType="email-address"
            placeholderTextColor="#888"
          />
          <Text style={styles.inputLabel}>Senha</Text>
          <TextInput
            style={styles.inputPass}
            placeholder="Digite sua senha"
            secureTextEntry={true}
            placeholderTextColor="#888"
          />
          <TouchableOpacity
            style={styles.buttonLogin}
            onPress={() => navigation.navigate("Index")}
          >
            <Text style={styles.buttonText}>Entrar</Text>
          </TouchableOpacity>
        </View>
        <Text style={styles.textEntrar}>Ou entre com</Text>
        <View style={styles.buttonsEntrar}>
          <TouchableOpacity style={styles.buttonGoogleApple}>
            <AntDesign name="google" size={24} color="black" />
            <Text style={styles.buttonGoogleAppleText}>Entrar com Google</Text>
          </TouchableOpacity>
          <TouchableOpacity style={styles.buttonGoogleApple}>
            <AntDesign name="apple1" size={24} color="black" />
            <Text style={styles.buttonGoogleAppleText}>Entrar com Apple</Text>
          </TouchableOpacity>
          <TouchableOpacity
            style={styles.buttonEsqueceu}
            onPress={() => navigation.navigate("EsqueciSenha")}
          >
            <Text style={styles.textEsqueceu}>Esqueceu a senha?</Text>
          </TouchableOpacity>
        </View>
      </ScrollView>
    </KeyboardAvoidingView>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: "#fff",
  },
  scrollViewContent: {
    alignItems: "center",
    justifyContent: "center",
    paddingVertical: 20,
  },
  textBemVindo: {
    fontSize: 30,
    fontWeight: "500",
    marginBottom: 10,
  },
  textDadosUser: {
    fontSize: 16,
    maxWidth: "80%",
    textAlign: "center",
    marginBottom: 20,
  },
  formsContainer: {
    width: "80%",
    paddingVertical: 20,
  },
  inputLabel: {
    fontSize: 14,
    fontWeight: "600",
    marginBottom: 5,
    color: "#333",
  },
  inputLogin: {
    height: 50,
    width: "100%",
    borderColor: "#ccc",
    borderWidth: 2,
    borderRadius: 25,
    paddingLeft: 15,
    marginBottom: 20,
    fontSize: 16,
    backgroundColor: "#f5f5f5",
  },
  inputPass: {
    height: 50,
    width: "100%",
    borderColor: "#ccc",
    borderWidth: 2,
    borderRadius: 25,
    paddingLeft: 15,
    fontSize: 16,
    backgroundColor: "#f5f5f5",
  },
  buttonLogin: {
    alignSelf: "center",
    height: 50,
    width: "60%",
    backgroundColor: "#4CAF50",
    justifyContent: "center",
    alignItems: "center",
    borderRadius: 25,
    marginTop: 30,
  },
  buttonText: {
    color: "#fff",
    fontSize: 16,
    fontWeight: "500",
  },
  textEntrar: {
    fontSize: 15,
    marginVertical: 10,
  },
  buttonsEntrar: {
    alignItems: "center",
  },
  buttonGoogleApple: {
    flexDirection: "row",
    borderColor: "#ccc",
    borderWidth: 2,
    alignItems: "center",
    justifyContent: "center",
    backgroundColor: "#fff",
    height: 50,
    width: 200,
    borderRadius: 25,
    marginTop: 20,
  },
  buttonGoogleAppleText: {
    color: "black",
    fontSize: 16,
    fontWeight: "500",
    marginLeft: 10,
  },
  buttonEsqueceu: {
    alignSelf: "center",
    marginTop: 30,
  },
  textEsqueceu: {
    fontSize: 16,
    fontWeight: "bold",
  },
});
