import React, { useState } from "react";
import { StatusBar } from "expo-status-bar";
import {
  View,
  Text,
  Button,
  Modal,
  ScrollView,
  StyleSheet,
  TouchableOpacity,
} from "react-native";
import { MaterialIcons } from "@expo/vector-icons"; // Importe o MaterialIcons

export default function RefeicaoDia() {
  const [modalVisible, setModalVisible] = useState(false);
  const [selectedRefeicao, setSelectedRefeicao] = useState(null);

  const refeicoes = {
    cafeManha: {
      nome: "Ovos Mexidos com Pão Integral",
      ingredientes: ["Ovos", "Pão integral", "Manteiga", "Queijo"],
      nutrientes: {
        proteinas: "12g",
        carboidratos: "20g",
        gorduras: "18g",
        acucares: "3g",
        valorEnergetico: "250 kcal",
      },
    },
    almoco: {
      nome: "Frango Grelhado com Arroz e Salada",
      ingredientes: ["Peito de frango", "Arroz integral", "Alface", "Tomate"],
      nutrientes: {
        proteinas: "30g",
        carboidratos: "40g",
        gorduras: "15g",
        acucares: "5g",
        valorEnergetico: "350 kcal",
      },
    },
    cafeTarde: {
      nome: "Iogurte com Granola",
      ingredientes: ["Iogurte natural", "Granola", "Mel"],
      nutrientes: {
        proteinas: "10g",
        carboidratos: "25g",
        gorduras: "8g",
        acucares: "12g",
        valorEnergetico: "200 kcal",
      },
    },
    jantar: {
      nome: "Sopa de Legumes",
      ingredientes: ["Cenoura", "Abóbora", "Batata-doce", "Caldo de galinha"],
      nutrientes: {
        proteinas: "5g",
        carboidratos: "30g",
        gorduras: "7g",
        acucares: "4g",
        valorEnergetico: "180 kcal",
      },
    },
  };

  const handlePress = (refeicao) => {
    setSelectedRefeicao(refeicao);
    setModalVisible(true);
  };

  return (
    <View style={styles.container}>
      {Object.keys(refeicoes).map((key) => (
        <TouchableOpacity
          key={key}
          style={styles.button}
          onPress={() => handlePress(refeicoes[key])}
        >
          <Text style={styles.buttonText}>
            {key.replace(/([A-Z])/g, " $1")}
          </Text>
          <MaterialIcons
            name="keyboard-arrow-down"
            size={24}
            color="black"
            style={styles.icon}
          />
        </TouchableOpacity>
      ))}

      <Modal
        visible={modalVisible}
        animationType="slide"
        onRequestClose={() => setModalVisible(false)}
      >
        <View style={styles.modalContainer}>
          <ScrollView contentContainerStyle={styles.scrollContainer}>
            {selectedRefeicao && (
              <>
                <Text style={styles.modalTitle}>{selectedRefeicao.nome}</Text>
                <Text style={styles.subTitle}>Ingredientes:</Text>
                <Text>{selectedRefeicao.ingredientes.join(", ")}</Text>

                <Text style={styles.subTitle}>Nutrientes:</Text>
                <View style={styles.nutrientContainer}>
                  <Text>
                    Proteínas: {selectedRefeicao.nutrientes.proteinas}
                  </Text>
                  <Text>
                    Carboidratos: {selectedRefeicao.nutrientes.carboidratos}
                  </Text>
                  <Text>Gorduras: {selectedRefeicao.nutrientes.gorduras}</Text>
                  <Text>Açúcares: {selectedRefeicao.nutrientes.acucares}</Text>
                  <Text>
                    Valor energético:{" "}
                    {selectedRefeicao.nutrientes.valorEnergetico}
                  </Text>
                </View>
                <TouchableOpacity
                  style={styles.closeButton}
                  onPress={() => setModalVisible(false)}
                >
                  <Text style={styles.closeButtonText}>Fechar</Text>
                </TouchableOpacity>
              </>
            )}
          </ScrollView>
        </View>
      </Modal>

      <StatusBar style="auto" />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: "center",
    padding: 20,
  },
  button: {
    flexDirection: "row",
    alignItems: "center",
    backgroundColor: "#0fb600",
    padding: 10,
    marginVertical: 10,
    borderRadius: 5,
  },
  buttonText: {
    color: "white",
    fontSize: 18,
    fontWeight: "bold",
    marginRight: 10,
  },
  icon: {
    marginLeft: 10,
  },
  modalContainer: {
    flex: 1,
    justifyContent: "center",
    padding: 20,
    backgroundColor: "white",
  },
  scrollContainer: {
    flexGrow: 1,
    justifyContent: "flex-start",
  },
  modalTitle: {
    fontSize: 22,
    fontWeight: "bold",
    marginBottom: 10,
  },
  subTitle: {
    fontSize: 18,
    fontWeight: "600",
    marginTop: 10,
    marginBottom: 5,
  },
  nutrientContainer: {
    marginTop: 10,
  },
  closeButton: {
    backgroundColor: "#ff3b30",
    paddingVertical: 10,
    paddingHorizontal: 20,
    borderRadius: 5,
    marginTop: 20,
    alignSelf: "center",
  },
  closeButtonText: {
    color: "white",
    fontSize: 18,
    fontWeight: "bold",
    textAlign: "center",
  },
});
