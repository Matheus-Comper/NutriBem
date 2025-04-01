import { StatusBar } from 'expo-status-bar';
import { StyleSheet, Text, View } from 'react-native';

export default function NotifyScreen() {
  return (
    <View style={styles.container}>
      <Text style={styles.textNotify}>Nenhuma Notificação</Text>
      <StatusBar style="auto" />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
  textNotify: {
    fontSize: 30,
    fontWeight: "500",
  },
});