import { StatusBar } from "expo-status-bar";
import {
  StyleSheet,
  Text,
  View,
  TextInput,
  TouchableOpacity,
  ScrollView,
  KeyboardAvoidingView,
  Platform,
} from "react-native";

export default function EsqueciSenha() {
  return (
    <KeyboardAvoidingView
      style={{ flex: 1 }}
      behavior={Platform.OS === "ios" ? "padding" : "height"}
    >
      <ScrollView contentContainerStyle={styles.container}>
        <Text style={styles.textEsqueci}>Esqueceu sua senha?</Text>
        <Text style={styles.textRecuperar}>
          Insira seu email para que possa ser enviado um código de recuperação
          de senha
        </Text>
        <Text style={styles.inputLabel}>Email</Text>
        <TextInput
          style={styles.inputLogin}
          placeholder="Digite seu email"
          keyboardType="email-address"
          placeholderTextColor="#888"
        />
        <TouchableOpacity style={styles.buttonLogin}>
          <Text style={styles.buttonText}>Enviar</Text>
        </TouchableOpacity>
        <StatusBar style="auto" />
      </ScrollView>
    </KeyboardAvoidingView>
  );
}

const styles = StyleSheet.create({
  container: {
    flexGrow: 1,
    backgroundColor: "#fff",
    alignItems: "center",
    justifyContent: "center",
    paddingBottom: 20,
  },
  inputLabel: {
    position: "absolute",
    top: "24%",
    left: "6%",
    fontSize: 22,
    fontWeight: "600",
    color: "black",
  },
  inputLogin: {
    position: "absolute",
    top: "30%",
    height: 50,
    width: "88%",
    borderColor: "#ccc",
    borderWidth: 2,
    borderRadius: 10,
    paddingLeft: 15,
    marginBottom: 10,
    fontSize: 16,
    backgroundColor: "#f5f5f5",
  },
  textEsqueci: {
    fontSize: 26,
    fontWeight: "600",
    position: "absolute",
    top: "6%",
    left: "6%",
  },
  textRecuperar: {
    fontSize: 16,
    width: "90%",
    position: "absolute",
    top: "14%",
    left: "6%",
  },
  buttonLogin: {
    alignSelf: "center",
    height: 50,
    width: "60%",
    backgroundColor: "#0fb600",
    justifyContent: "center",
    alignItems: "center",
    borderRadius: 10,
  },
  buttonText: {
    color: "#fff",
    fontSize: 18,
    fontWeight: "500",
  },
});
