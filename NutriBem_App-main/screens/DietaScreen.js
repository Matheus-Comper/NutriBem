import React, { useState } from 'react';
import { FlatList, View, Text, Image, StyleSheet, TouchableOpacity, ScrollView } from 'react-native';

const meals = [
  {
    id: '1',
    name: 'Dr Marcos',
    mealName: 'Macarrão Integral com Molho',
    imageUrl: 'https://www.sabornamesa.com.br/media/k2/items/cache/ce6a239f3f33a6f46229d1458612a154_XL.jpg',
    profileImageUrl: 'https://randomuser.me/api/portraits/men/1.jpg',
    recipeDetails: 'Ferva a água, cozinhe o macarrão integral por 10 minutos, e prepare o molho com tomate e azeite.',
  },
  {
    id: '2',
    name: 'Dr Luis Carlos Jr.',
    mealName: 'Brownie de Chocolate',
    imageUrl: 'https://amorpelacomida.com.br/wp-content/uploads/2017/07/receita-brownie-vegano-funcional-sem-gluten-sem-lactose-facil-e-saboroso.jpg',
    profileImageUrl: 'https://randomuser.me/api/portraits/men/2.jpg',
    recipeDetails: 'Misture os ingredientes secos, adicione os molhados e asse a 180°C por 20 minutos.',
  },
  {
    id: '3',
    name: 'Dra Carla Mendes',
    mealName: 'Salada Tropical',
    imageUrl: 'https://www.saboresajinomoto.com.br/uploads/images/recipes/salada-tropical-3.jpg',
    profileImageUrl: 'https://randomuser.me/api/portraits/women/3.jpg',
    recipeDetails: 'Corte frutas frescas como manga e abacaxi, adicione folhas e molhe com molho de iogurte.',
  },
];

export default function DietaScreen() {
  const [selectedMeal, setSelectedMeal] = useState(null);

  const handleSelectMeal = (meal) => {
    setSelectedMeal(meal);
  };

  const renderMealList = () => (
    <FlatList
      data={meals}
      renderItem={({ item }) => (
        <TouchableOpacity onPress={() => handleSelectMeal(item)}>
          <View style={styles.mealCard}>
            <View style={styles.header}>
              <Image source={{ uri: item.profileImageUrl }} style={styles.profileCircle} />
              <Text style={styles.userName}>{item.name}</Text>
            </View>
            <Image source={{ uri: item.imageUrl }} style={styles.mealImage} />
            <Text style={styles.mealName}>{item.mealName}</Text>
          </View>
        </TouchableOpacity>
      )}
      keyExtractor={(item) => item.id}
      contentContainerStyle={styles.listContainer}
    />
  );

  const renderMealDetails = () => (
    <ScrollView contentContainerStyle={styles.detailsContainer}>
      <Image source={{ uri: selectedMeal.imageUrl }} style={styles.mealImage} />
      <Text style={styles.mealName}>{selectedMeal.mealName}</Text>
      <Text style={styles.recipeDetails}>{selectedMeal.recipeDetails}</Text>
      <TouchableOpacity onPress={() => setSelectedMeal(null)} style={styles.backButton}>
        <Text style={styles.backButtonText}>Voltar</Text>
      </TouchableOpacity>
    </ScrollView>
  );

  return (
    <View style={styles.container}>
      {selectedMeal ? renderMealDetails() : renderMealList()}
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'flex-start',
    padding: 16,
  },
  listContainer: {
    flexGrow: 1,
    paddingHorizontal: 8,
  },
  mealCard: {
    marginBottom: 16,
    backgroundColor: '#f8f8f8',
    borderRadius: 8,
    padding: 16,
    width: '90%',
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.2,
    shadowRadius: 4,
    elevation: 3,
  },
  header: {
    flexDirection: 'row',
    alignItems: 'center',
    marginBottom: 8,
  },
  profileCircle: {
    width: 40,
    height: 40,
    borderRadius: 20,
    marginRight: 8,
  },
  userName: {
    fontSize: 16,
    fontWeight: 'bold',
  },
  mealImage: {
    width: '100%',
    height: 150,
    borderRadius: 8,
    marginBottom: 8,
  },
  mealName: {
    fontSize: 16,
    fontWeight: '600',
    color: '#333',
    textAlign: 'center',
  },
  recipeDetails: {
    fontSize: 16,
    color: '#333',
    textAlign: 'center',
    marginTop: 16,
    marginBottom: 24,
  },
  backButton: {
    marginTop: 16,
    padding: 10,
    backgroundColor: '#007bff',
    borderRadius: 8,
  },
  backButtonText: {
    color: '#fff',
    fontSize: 16,
    fontWeight: 'bold',
  },
  detailsContainer: {
    paddingHorizontal: 16,
    paddingBottom: 40,
  },
});
