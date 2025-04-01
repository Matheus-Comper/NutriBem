import React, { useState } from "react";
import { StatusBar } from 'expo-status-bar';
import { StyleSheet, View, Text, ScrollView, Switch, Button, Linking, TouchableOpacity } from 'react-native';

export default function ConfiguracaoScreen({ navigation }) {
  const [isDarkMode, setIsDarkMode] = useState(false);
  const [isNotificationsEnabled, setIsNotificationsEnabled] = useState(true);
  const [language, setLanguage] = useState('Português');

  const toggleDarkMode = () => setIsDarkMode(previousState => !previousState);
  const toggleNotifications = () => setIsNotificationsEnabled(previousState => !previousState);
  const changeLanguage = (newLanguage) => setLanguage(newLanguage);

  return (
    <ScrollView style={styles.container}>
      {/* Seção de Título */}
      <View style={styles.section}>
        <Text style={styles.title}>Configurações do App</Text>
      </View>

      {/* Seção de Tema */}
      <View style={styles.section}>
        <Text style={styles.subtitle}>Modo de Exibição</Text>
        <Text style={styles.text}>Selecione o modo de exibição do aplicativo:</Text>
        <View style={styles.option}>
          <Text style={styles.text}>Modo Escuro</Text>
          <Switch
            value={isDarkMode}
            onValueChange={toggleDarkMode}
          />
        </View>
      </View>

      {/* Seção de Notificações */}
      <View style={styles.section}>
        <Text style={styles.subtitle}>Notificações</Text>
        <Text style={styles.text}>Ativar notificações para alertas e atualizações:</Text>
        <View style={styles.option}>
          <Text style={styles.text}>Habilitar Notificações</Text>
          <Switch
            value={isNotificationsEnabled}
            onValueChange={toggleNotifications}
          />
        </View>
      </View>

      {/* Seção de Idioma */}
      <View style={styles.section}>
        <Text style={styles.subtitle}>Idioma</Text>
        <Text style={styles.text}>Escolha o idioma do aplicativo:</Text>
        <View style={styles.option}>
          <Button title={language} onPress={() => changeLanguage(language === 'Português' ? 'Inglês' : 'Português')} />
        </View>
      </View>

      {/* Seção de Conta */}
      <View style={styles.section}>
        <Text style={styles.subtitle}>Conta</Text>
        <Text style={styles.text}>Visualize ou altere os detalhes da sua conta.</Text>
        <View style={styles.option}>
          <TouchableOpacity onPress={() => navigation.navigate('MeusDados')}>
            <Text style={styles.linkText}>Ver Detalhes da Conta</Text>
          </TouchableOpacity>
        </View>
      </View>

      {/* Seção de Suporte */}
      <View style={styles.section}>
        <Text style={styles.subtitle}>Precisa de Ajuda?</Text>
        <Text style={styles.text}>Se você encontrar algum problema ou tiver dúvidas, nossa equipe de suporte está pronta para ajudar!</Text>
        <Button
          title="Entrar em contato"
          onPress={() => Linking.openURL('mailto:support@app.com')}
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
    fontWeight: 'bold',
    marginBottom: 10,
  },
  subtitle: {
    fontSize: 20,
    fontWeight: '600',
    marginBottom: 5,
  },
  text: {
    fontSize: 16,
    lineHeight: 24,
    marginBottom: 10,
  },
  option: {
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'space-between',
    marginBottom: 10,
  },
  linkText: {
    fontSize: 16,
    color: '#0fb600',
    textDecorationLine: 'underline',
  },
});
