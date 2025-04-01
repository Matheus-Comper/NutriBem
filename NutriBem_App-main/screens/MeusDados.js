import React, { useState } from "react";
import {
  StyleSheet,
  Text,
  TextInput,
  View,
  TouchableOpacity,
  SafeAreaView,
} from "react-native";
import { MaterialIcons } from "@expo/vector-icons";

export default function MeusDados() {
  const [isEditing, setIsEditing] = useState(false);
  const [formData, setFormData] = useState({
    nome: "XXXXXX XXXXXX",
    idade: "XX",
    altura: "X,XX",
    peso: "XX,XX",
    usuario: "XXXXXX",
    senha: "XXXXXX",
  });

  const handleEditPress = () => {
    if (isEditing) {
      console.log("Dados salvos:", formData);
    }
    setIsEditing(!isEditing);
  };

  const handleInputChange = (field, value) => {
    setFormData({ ...formData, [field]: value });
  };

  return (
    <SafeAreaView style={styles.safeArea}>
      <View style={styles.container}>
        <View style={styles.inputContainer}>
          <Text style={styles.label}>Nome Completo</Text>
          <TextInput
            style={styles.input}
            value={formData.nome}
            editable={isEditing}
            onChangeText={(value) => handleInputChange("nome", value)}
          />
        </View>

        <View style={styles.inputContainer}>
          <Text style={styles.label}>Idade</Text>
          <TextInput
            style={styles.input}
            value={formData.idade}
            editable={isEditing}
            keyboardType="numeric"
            onChangeText={(value) => handleInputChange("idade", value)}
          />
        </View>

        <View style={styles.inputContainer}>
          <Text style={styles.label}>Altura</Text>
          <TextInput
            style={styles.input}
            value={formData.altura}
            editable={isEditing}
            keyboardType="numeric"
            onChangeText={(value) => handleInputChange("altura", value)}
          />
        </View>

        <View style={styles.inputContainer}>
          <Text style={styles.label}>Peso</Text>
          <TextInput
            style={styles.input}
            value={formData.peso}
            editable={isEditing}
            keyboardType="numeric"
            onChangeText={(value) => handleInputChange("peso", value)}
          />
        </View>

        <View style={styles.inputContainer}>
          <Text style={styles.label}>Nome Usuário</Text>
          <TextInput
            style={styles.input}
            value={formData.usuario}
            editable={isEditing}
            onChangeText={(value) => handleInputChange("usuario", value)}
          />
        </View>

        <View style={styles.inputContainer}>
          <Text style={styles.label}>Senha</Text>
          <TextInput
            style={styles.input}
            value={formData.senha}
            editable={isEditing}
            secureTextEntry={true}
            onChangeText={(value) => handleInputChange("senha", value)}
          />
        </View>

        <TouchableOpacity style={styles.editButton} onPress={handleEditPress}>
          <MaterialIcons
            name={isEditing ? "save" : "edit"}
            size={30}
            color="#000"
          />
        </TouchableOpacity>
      </View>
    </SafeAreaView>
  );
}

const styles = StyleSheet.create({
  safeArea: {
    flex: 1,
    backgroundColor: "#fff",
  },
  container: {
    flex: 1,
    padding: 20,
  },
  inputContainer: {
    marginBottom: 20,
  },
  label: {
    fontSize: 16,
    color: "#000",
    marginBottom: 5,
    fontWeight: "bold",
  },
  input: {
    borderBottomWidth: 1,
    borderBottomColor: "#ccc",
    fontSize: 16,
    color: "#333",
    paddingVertical: 5,
  },
  editButton: {
    position: "absolute",
    bottom: 20,
    right: 20,
    backgroundColor: "#f5f5f5",
    borderRadius: 50,
    padding: 10,
    shadowColor: "#000",
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.3,
    shadowRadius: 3,
    elevation: 5,
  },
});
