print("=-"*30)
print("EXERCICIO")
li = int(input("digite a quantidade de litros :"))
km = 12

quan = li * km
print("a quantidade de litros consumido foi {} e a distancia foi {}km".format(li,quan))
if li >= 8:
    print("ATENÇÃO, PRECISA IR A UM POSTO DE COMBUTIVEL")
else:
    print("PODE SEGUIR VIAGEM")

