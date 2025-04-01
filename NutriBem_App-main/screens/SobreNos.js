import React from "react";
import { StyleSheet, Text, View, ScrollView, SafeAreaView } from "react-native";

export default function SobreNos() {
  return (
    <SafeAreaView style={styles.safeArea}>
      <ScrollView contentContainerStyle={styles.scrollContainer}>
        <View style={styles.container}>
          <Text style={styles.paragraph}>
            Somos apaixonados por comida de verdade e acreditamos que uma
            alimentação saudável pode transformar vidas. Nosso objetivo é
            inspirar e guiar você a fazer escolhas mais conscientes e
            nutritivas, sem abrir mão do sabor.
          </Text>

          <Text style={styles.paragraph}>
            Nossa missão é simplificar o caminho para uma alimentação
            equilibrada, trazendo receitas práticas, dicas de nutrição e
            produtos que respeitam seu corpo e o meio ambiente. Acreditamos que
            comer bem é mais do que contar calorias—é sobre nutrir seu corpo,
            sua mente e criar uma relação positiva com a comida.
          </Text>

          <Text style={styles.paragraph}>
            Nosso time é formado por nutricionistas, chefs e apaixonados por
            culinária, todos comprometidos em compartilhar o melhor da
            alimentação saudável com você. Trabalhamos para desmistificar a
            alimentação balanceada, mostrando que ela pode ser deliciosa,
            acessível e parte do seu dia a dia.
          </Text>

          <Text style={styles.paragraph}>
            Junte-se a nós nessa jornada de bem-estar e descubra como pequenas
            mudanças na sua alimentação podem fazer uma grande diferença na sua
            vida. Aqui, comer bem é simples e prazeroso!
          </Text>

          <Text style={styles.paragraph}>
            <Text style={styles.bold}>Termos de Licença:</Text>
            {"\n"}
            Este Termo de Licença concede ao usuário do aplicativo NUTRIBEM uma
            licença limitada, não exclusiva, intransferível e revogável para uso
            pessoal e não comercial. O aplicativo e seu conteúdo são de
            propriedade da NUTRIBEM, e o usuário não pode copiar, modificar,
            vender ou explorar o aplicativo de maneira comercial sem
            autorização. Ao utilizar o aplicativo, o usuário concorda com os
            termos estabelecidos e com a titularidade da empresa sobre todos os
            direitos de propriedade intelectual.
          </Text>
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
    paddingHorizontal: 20,
    paddingVertical: 10,
  },
  container: {
    flex: 1,
  },
  paragraph: {
    fontSize: 16,
    lineHeight: 24,
    color: "#333",
    marginBottom: 20,
    textAlign: "justify",
  },
  bold: {
    fontWeight: "bold",
  },
});
