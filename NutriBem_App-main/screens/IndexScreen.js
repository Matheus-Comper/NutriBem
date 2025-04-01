import React, { useState } from "react";
import {
  View,
  Text,
  StyleSheet,
  TouchableOpacity,
  TextInput,
  Image,
  FlatList,
  ScrollView,
  SafeAreaView,
} from "react-native";
import { createBottomTabNavigator } from "@react-navigation/bottom-tabs";
import AntDesign from "@expo/vector-icons/AntDesign";
import MaterialIcons from "@expo/vector-icons/MaterialIcons";
import Fontisto from "@expo/vector-icons/Fontisto";
import Ionicons from "@expo/vector-icons/Ionicons";

const recipes = [
  { id: "1", image: require("../assets/arroz.jpg"), title: "Arroz" },
  { id: "2", image: require("../assets/frango.jpg"), title: "Frango" },
  { id: "3", image: require("../assets/peixe.jpg"), title: "Peixe" },
  { id: "4", image: require("../assets/almondega.jpg"), title: "Almôndegas" },
];

function Home({ navigation }) {
  return (
    <SafeAreaView style={styles.safeContainer}>
      <ScrollView contentContainerStyle={styles.scrollContainer}>
        <Text style={styles.textOla}>Olá</Text>
        <Text style={styles.textUser}>Usuário</Text>
        <TouchableOpacity style={styles.buttonNotify}
          onPress={() => navigation.navigate("NotifyScreen")}
        >
          <MaterialIcons name="notifications-active" size={34} color="black" />
        </TouchableOpacity>
        <View style={styles.searchBarContainer}>
          <Fontisto name="search" size={24} color="black" style={styles.icon} />
          <TextInput style={styles.searchBar} placeholder="Pesquisar..." />
        </View>
        <View style={styles.containerImages}>
          <Text style={styles.sectionTitle}>Receitas Sugeridas</Text>
          <FlatList
            data={recipes}
            horizontal
            showsHorizontalScrollIndicator={false}
            keyExtractor={(item) => item.id}
            renderItem={({ item }) => (
              <View style={styles.imageContainer}>
                <Image source={item.image} style={styles.image} />
                <Text style={styles.imageTitle}>{item.title}</Text>
              </View>
            )}
          />
        </View>
        <View style={styles.buttonsContainer}>
          <TouchableOpacity
            style={styles.button}
            onPress={() => navigation.navigate("RefeicaoDia")}
          >
            <Text style={styles.textButton}>Refeições do Dia</Text>
          </TouchableOpacity>
          <TouchableOpacity style={styles.button}
            onPress={() => navigation.navigate("DietaScreen")}
          >
            <Text style={styles.textButton}>Dietas para você</Text>
          </TouchableOpacity>
          <TouchableOpacity
            style={styles.button}
            onPress={() => navigation.navigate("MinhasMetas")}
          >
            <Text style={styles.textButton}>Minhas Metas</Text>
          </TouchableOpacity>
          <TouchableOpacity style={styles.button}
            onPress={() => navigation.navigate("DicaScreen")}
          >
            <Text style={styles.textButton}>Dicas</Text>
          </TouchableOpacity>
        </View>
      </ScrollView>
    </SafeAreaView>
  );
}

import * as ImagePicker from "expo-image-picker";

function Profile({ navigation }) {
  const [profileImage, setProfileImage] = useState(null);

  const handleChoosePhoto = async () => {
    const permissionResult =
      await ImagePicker.requestMediaLibraryPermissionsAsync();

    if (!permissionResult.granted) {
      alert("Permissão para acessar a galeria é necessária!");
      return;
    }

    const result = await ImagePicker.launchImageLibraryAsync({
      mediaTypes: ImagePicker.MediaTypeOptions.Images,
      quality: 1,
    });

    if (!result.canceled) {
      setProfileImage(result.assets[0].uri);
    }
  };

  return (
    <SafeAreaView style={styles.safeContainer}>
      <View style={styles.container}>
        <View style={styles.header}>
          <TouchableOpacity onPress={handleChoosePhoto}>
            <Image
              source={
                profileImage
                  ? { uri: profileImage }
                  : { uri: "https://via.placeholder.com/100" }
              }
              style={styles.profileImage}
            />
          </TouchableOpacity>
          <Text style={styles.name}>Usuário</Text>
          <Text style={styles.email}>email123@gmail.com</Text>
        </View>

        <View style={styles.options}>
          <TouchableOpacity
            style={styles.menuItem}
            onPress={() => navigation.navigate("MeusDados")}
          >
            <Ionicons name="person-circle-outline" size={30} color="#0fb600" />
            <Text style={styles.menuText}>Meus Dados</Text>
          </TouchableOpacity>

          <TouchableOpacity
            style={styles.menuItem}
            onPress={() => navigation.navigate("Configuracao")}
          >
            <AntDesign name="setting" size={30} color="#0fb600" />
            <Text style={styles.menuText}>Configurações</Text>
          </TouchableOpacity>

          <TouchableOpacity
            style={styles.menuItem}
            onPress={() => navigation.navigate("SobreNos")}
          >
            <Ionicons
              name="information-circle-outline"
              size={30}
              color="#0fb600"
            />
            <Text style={styles.menuText}>Sobre Nós</Text>
          </TouchableOpacity>

          <TouchableOpacity
            style={styles.menuItem}
            onPress={() => navigation.navigate("AjudaScreen")}
          >
            <Ionicons name="help-circle-outline" size={30} color="#0fb600" />
            <Text style={styles.menuText}>Ajuda</Text>
          </TouchableOpacity>

          <TouchableOpacity
            style={styles.menuItem}
            onPress={() => navigation.navigate("Login")}
          >
            <Ionicons name="exit-outline" size={30} color="#0fb600" />
            <Text style={styles.menuText}>Sair</Text>
          </TouchableOpacity>
        </View>
      </View>
    </SafeAreaView>
  );
}

const Tab = createBottomTabNavigator();

export default function Rotas() {
  return (
    <Tab.Navigator
      initialRouteName="Home"
      screenOptions={({ route }) => ({
        tabBarIcon: ({ focused, color, size }) => {
          let iconName;

          if (route.name === "Home") {
            iconName = "home";
          } else if (route.name === "Perfil") {
            iconName = "user";
          }

          return <AntDesign name={iconName} size={size} color={color} />;
        },
        tabBarActiveTintColor: "green",
        tabBarInactiveTintColor: "gray",
        tabBarStyle: {
          backgroundColor: "#f0f0f0",
          borderTopLeftRadius: 15,
          borderTopRightRadius: 15,
          height: 60,
        },
        tabBarLabelStyle: {
          fontSize: 12,
          fontWeight: "500",
        },
        headerShown: false,
      })}
    >
      <Tab.Screen name="Home" component={Home} />
      <Tab.Screen name="Perfil" component={Profile} />
    </Tab.Navigator>
  );
}

const styles = StyleSheet.create({
  scrollContainer: {
    flexGrow: 1,
    backgroundColor: "#fff",
    paddingBottom: 20,
  },
  textOla: {
    marginTop: 20,
    marginLeft: 16,
    fontSize: 22,
    fontWeight: "400",
  },
  textUser: {
    marginTop: 5,
    marginLeft: 16,
    fontSize: 30,
    fontWeight: "bold",
    color: "#0fb600",
  },
  buttonNotify: {
    position: "absolute",
    top: 20,
    right: 16,
  },
  searchBarContainer: {
    marginTop: 20,
    flexDirection: "row",
    alignItems: "center",
    borderRadius: 10,
    borderColor: "gray",
    backgroundColor: "#f0f0f0",
    paddingLeft: 8,
    width: "90%",
    height: 40,
    alignSelf: "center",
  },
  searchBar: {
    flex: 1,
    paddingLeft: 8,
    height: "100%",
    backgroundColor: "transparent",
  },
  icon: {
    marginRight: 8,
  },
  containerImages: {
    marginTop: 30,
    paddingHorizontal: 16,
  },
  sectionTitle: {
    fontSize: 18,
    fontWeight: "bold",
    marginBottom: 10,
  },
  imageContainer: {
    marginRight: 12,
    alignItems: "center",
  },
  image: {
    width: 250,
    height: 150,
    borderRadius: 10,
  },
  imageTitle: {
    marginTop: 8,
    fontSize: 14,
    fontWeight: "500",
    textAlign: "center",
  },
  buttonsContainer: {
    marginTop: 40,
    flexDirection: "row",
    flexWrap: "wrap",
    justifyContent: "space-around",
    paddingHorizontal: 10,
  },
  button: {
    width: "45%",
    height: 50,
    backgroundColor: "#0fb600",
    justifyContent: "center",
    alignItems: "center",
    borderRadius: 10,
    marginVertical: 12,
  },
  textButton: {
    color: "#fff",
    fontWeight: "bold",
  },
  safeContainer: {
    flex: 1,
    backgroundColor: "#fff",
  },
  container: {
    flex: 1,
    backgroundColor: "#fff",
    padding: 20,
  },
  header: {
    alignItems: "center",
    marginBottom: 20,
  },
  profileImage: {
    width: 100,
    height: 100,
    borderRadius: 50,
    marginBottom: 10,
  },
  name: {
    fontSize: 18,
    fontWeight: "bold",
    color: "#000",
  },
  email: {
    fontSize: 14,
    color: "#555",
  },
  options: {
    marginTop: 20,
  },
  menuItem: {
    alignSelf: "center",
    width: "100%",
    flexDirection: "row",
    alignItems: "center",
    padding: 15,
    backgroundColor: "#f8f8f8",
    borderRadius: 8,
    marginBottom: 10,
  },
  menuText: {
    fontSize: 16,
    color: "#000",
    marginLeft: 10,
  },
});
