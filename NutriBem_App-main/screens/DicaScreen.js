import React from 'react';
import { FlatList, View, Text, Image, StyleSheet } from 'react-native';

const recipes = [
  {
    id: '1',
    name: 'Dr Marcos',
    foodName: 'Macarrão Integral com Molho',
    imageUrl: 'https://www.sabornamesa.com.br/media/k2/items/cache/ce6a239f3f33a6f46229d1458612a154_XL.jpg',
    profileImageUrl: 'https://randomuser.me/api/portraits/men/1.jpg', 
  },
  {
    id: '2',
    name: 'Dr Luis Carlos Jr.',
    foodName: 'Brownie de Chocolate',
    imageUrl: 'https://amorpelacomida.com.br/wp-content/uploads/2017/07/receita-brownie-vegano-funcional-sem-gluten-sem-lactose-facil-e-saboroso.jpg',
    profileImageUrl: 'https://randomuser.me/api/portraits/men/4.jpg', 
  },
  {
    id: '3',
    name: 'Dra Carla Mendes',
    foodName: 'Salada Tropical',
    imageUrl: 'https://www.saboresajinomoto.com.br/uploads/images/recipes/salada-tropical-3.jpg',
    profileImageUrl: 'https://randomuser.me/api/portraits/women/3.jpg', 
  },
];

const DicaScreen = () => {
  const renderItem = ({ item }) => (
    <View style={styles.recipeCard}>
      <View style={styles.header}>
        <Image source={{ uri: item.profileImageUrl }} style={styles.profileCircle} />
        <Text style={styles.userName}>{item.name}</Text>
      </View>
      <Image source={{ uri: item.imageUrl }} style={styles.foodImage} />
      <Text style={styles.foodName}>{item.foodName}</Text>
    </View>
  );

  return (
    <FlatList
      data={recipes}
      renderItem={renderItem}
      keyExtractor={(item) => item.id}
      contentContainerStyle={styles.container}
    />
  );
};

const styles = StyleSheet.create({
  container: {
    padding: 16,
    backgroundColor: '#fff',
  },
  recipeCard: {
    marginBottom: 16,
    backgroundColor: '#f8f8f8',
    borderRadius: 8,
    padding: 12,
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
  foodImage: {
    width: '100%',
    height: 150,
    borderRadius: 8,
    marginBottom: 8,
  },
  foodName: {
    fontSize: 14,
    fontWeight: '600',
    color: '#333',
  },
});

export default DicaScreen;
