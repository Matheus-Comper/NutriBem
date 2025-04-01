import React from "react";
import { StatusBar } from "expo-status-bar";
import {
  StyleSheet,
  Text,
  View,
  TouchableOpacity,
  Image,
  SafeAreaView,
} from "react-native";
import { NavigationContainer } from "@react-navigation/native";
import { createStackNavigator } from "@react-navigation/stack";
import LoginScreen from "./screens/LoginScreen";
import CadastroScreen from "./screens/CadastroScreen";
import IndexScreen from "./screens/IndexScreen";
import EsqueciSenha from "./screens/EsqueciSenha";
import MinhasMetas from "./screens/MinhasMetas";
import SobreNos from "./screens/SobreNos";
import MeusDados from "./screens/MeusDados";
import AjudaScreen from "./screens/AjudaScreen";
import ConfiguracaoScreen from "./screens/ConfiguracaoScreen";
import RefeicaoDia from "./screens/RefeicaoDia";
import NotifyScreen from "./screens/NotifyScreen";
import DicaScreen from "./screens/DicaScreen";
import DietaScreen from "./screens/DietaScreen";

const Stack = createStackNavigator();

function HomeScreen({ navigation }) {
  return (
    <SafeAreaView style={styles.container}>
      <Text style={styles.textBemVindo}>Seja Bem Vindo</Text>
      <Text style={styles.textNutriBem}>NutriBem</Text>
      <Image source={require("./assets/logo.jpeg")} style={styles.image} />
      <View style={styles.buttons}>
        <TouchableOpacity
          style={styles.buttonLogin}
          onPress={() => navigation.navigate("Login")}
        >
          <Text style={styles.textLogin}>Login</Text>
        </TouchableOpacity>
        <TouchableOpacity
          style={styles.buttonLogin}
          onPress={() => navigation.navigate("Cadastro")}
        >
          <Text style={styles.textLogin}>Cadastro</Text>
        </TouchableOpacity>
      </View>
      <StatusBar style="auto" />
    </SafeAreaView>
  );
}

export default function App() {
  return (
    <NavigationContainer>
      <Stack.Navigator initialRouteName="Home">
        <Stack.Screen name="Home" component={HomeScreen} />
        <Stack.Screen name="Login" component={LoginScreen} />
        <Stack.Screen name="Cadastro" component={CadastroScreen} />
        <Stack.Screen
          name="Index"
          component={IndexScreen}
          options={{ title: "Home" }}
        />
        <Stack.Screen
          name="EsqueciSenha"
          component={EsqueciSenha}
          options={{ title: "Recuperar Senha" }}
        />
        <Stack.Screen
          name="MinhasMetas"
          component={MinhasMetas}
          options={{ title: "Minhas Metas" }}
        />
        <Stack.Screen
          name="SobreNos"
          component={SobreNos}
          options={{ title: "Sobre nós" }}
        />
        <Stack.Screen
          name="MeusDados"
          component={MeusDados}
          options={{ title: "Meus dados" }}
        />
        <Stack.Screen
          name="AjudaScreen"
          component={AjudaScreen}
          options={{ title: "Ajuda" }}
        />
        <Stack.Screen
          name="Configuracao"
          component={ConfiguracaoScreen}
          options={{ title: "Configurações" }}
        />
        <Stack.Screen
          name="RefeicaoDia"
          component={RefeicaoDia}
          options={{ title: "Refeição do dia" }}
        />
        <Stack.Screen
          name="NotifyScreen"
          component={NotifyScreen}
          options={{ title: "Notificações" }}
        />
        <Stack.Screen
          name="DicaScreen"
          component={DicaScreen}
          options={{ title: "Dicas" }}
        />
        <Stack.Screen
          name="DietaScreen"
          component={DietaScreen}
          options={{ title: "Dietas para você" }}
        />
      </Stack.Navigator>
    </NavigationContainer>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: "#fff",
    alignItems: "center",
    justifyContent: "center",
  },
  textBemVindo: {
    fontSize: 30,
    position: "absolute",
    top: "10%",
    textAlign: "center",
  },
  textNutriBem: {
    fontWeight: "bold",
    fontSize: 28,
    color: "#0fb600",
    position: "absolute",
    top: "16%",
    textAlign: "center",
  },
  buttons: {
    flexDirection: "row",
    justifyContent: "center",
    marginTop: 20,
  },
  buttonLogin: {
    width: "40%",
    height: 50,
    backgroundColor: "#0fb600",
    borderColor: "#0fb600",
    borderWidth: 4,
    borderRadius: 14,
    marginHorizontal: 10,
    alignItems: "center",
    justifyContent: "center",
  },
  textLogin: {
    fontWeight: "bold",
    color: "#fff",
    fontSize: 18,
  },
  image: {
    bottom: "5%",
    width: 200,
    height: 200,
    marginTop: 10,
  },
});
