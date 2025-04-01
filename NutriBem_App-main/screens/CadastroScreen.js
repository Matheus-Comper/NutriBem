import React from "react";
import {
  View,
  Text,
  StyleSheet,
  TextInput,
  TouchableOpacity,
  ScrollView,
} from "react-native";
import AntDesign from "@expo/vector-icons/AntDesign";

export default function CadastroScreen({ navigation }) {
  return (
    <ScrollView
      contentContainerStyle={styles.container}
      keyboardShouldPersistTaps="handled"
    >
      <Text style={styles.textBemVindo}>Crie sua conta</Text>
      <Text style={styles.textDadosUser}>
        Insira seus dados para criar sua conta
      </Text>
      <View style={styles.formsContainer}>
        <Text style={styles.inputLabel}>Nome</Text>
        <TextInput
          style={styles.inputLogin}
          placeholder="Digite seu nome"
          keyboardType="default"
          placeholderTextColor="#888"
        />
        <Text style={styles.inputLabel}>Email</Text>
        <TextInput
          style={styles.inputLogin}
          placeholder="Digite seu email"
          keyboardType="email-address"
          placeholderTextColor="#888"
        />
        <Text style={styles.inputLabel}>Senha</Text>
        <TextInput
          style={styles.inputLogin}
          placeholder="Digite sua senha"
          secureTextEntry={true}
          placeholderTextColor="#888"
        />
        <Text style={styles.inputLabel}>Confirme sua senha</Text>
        <TextInput
          style={styles.inputLogin}
          placeholder="Confirme sua senha"
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
      </View>
    </ScrollView>
  );
}

const styles = StyleSheet.create({
  container: {
    flexGrow: 1,
    backgroundColor: "#fff",
    justifyContent: "center",
    alignItems: "center",
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
    paddingVertical: 10,
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
    marginBottom: 10,
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
    marginTop: 20,
  },
  buttonText: {
    color: "#fff",
    fontSize: 16,
    fontWeight: "500",
  },
  textEntrar: {
    fontSize: 15,
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
});
