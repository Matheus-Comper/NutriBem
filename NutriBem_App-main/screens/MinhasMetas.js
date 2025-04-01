import { StatusBar } from "expo-status-bar";
import { StyleSheet, Text, View, ScrollView, SafeAreaView } from "react-native";

export default function MinhasMetas() {
  const nutrients = [
    { label: "Carboidratos", value: "0g" },
    { label: "Proteínas", value: "0g" },
    { label: "Açúcares Totais", value: "0g" },
    { label: "Valor Energético", value: "0g" },
    { label: "Gorduras Totais", value: "0g" },
  ];

  const renderBox = (label, value) => (
    <View style={styles.row} key={label}>
      <View style={styles.box}>
        <Text style={styles.label}>{label}</Text>
      </View>
      <Text style={styles.value}>{value}</Text>
    </View>
  );

  return (
    <SafeAreaView style={styles.safeArea}>
      <ScrollView contentContainerStyle={styles.scrollContainer}>
        <View style={styles.container}>
          <Text style={styles.text}>
            <Text style={styles.textParabens}>Parabéns! </Text>
            Nos últimos dias você atingiu suas metas diárias e semanais
          </Text>

          <View style={styles.section}>
            <Text style={styles.title}>Diário</Text>
            {nutrients.map((item) => renderBox(item.label, item.value))}
          </View>

          <View style={styles.divider} />

          <View style={styles.section}>
            <Text style={styles.title}>Semanal</Text>
            {nutrients.map((item) => renderBox(item.label, item.value))}
          </View>

          <StatusBar style="auto" />
        </View>
      </ScrollView>
    </SafeAreaView>
  );
}

const styles = StyleSheet.create({
  safeArea: {
    flex: 1,
    backgroundColor: "#fff",
  },
  scrollContainer: {
    flexGrow: 1,
    padding: 20,
  },
  container: {
    flex: 1,
  },
  textParabens: {
    color: "#0fb600",
    fontSize: 22,
    fontWeight: "bold",
  },
  text: {
    marginBottom: 30,
    fontSize: 18,
    maxWidth: "90%",
    textAlign: "center",
    color: "#333",
  },
  section: {
    marginBottom: 10,
  },
  title: {
    fontSize: 24,
    fontWeight: "bold",
    marginBottom: 10,
    color: "#000",
  },
  row: {
    flexDirection: "row",
    alignItems: "center",
    marginBottom: 15,
  },
  box: {
    width: 200,
    height: 50,
    backgroundColor: "#0fb600",
    borderRadius: 10,
    justifyContent: "center",
    alignItems: "center",
  },
  label: {
    fontSize: 18,
    fontWeight: "bold",
    color: "#000",
  },
  value: {
    fontSize: 18,
    fontWeight: "bold",
    color: "#000",
    marginLeft: 14,
  },
  divider: {
    height: 1,
    backgroundColor: "#000",
    marginVertical: 20,
  },
});
