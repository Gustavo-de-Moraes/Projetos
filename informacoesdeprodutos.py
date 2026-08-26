# biblioteca para colocar data atual

from datetime import datetime, date

hoje = datetime.now()
print("Data atual: {}".format(hoje))
# ------------------------------------


# Função para mostra o titulo do programa
def principal(t):
    t = t.upper()
    print("=-"*30)
    print(f"{t}")
    print("=-"*30)

print(principal("Loja"))
# ---------------------------------------

Totalp = 0
while True:
    precoP = 0
    Totalp = 0
    while precoP <= 0:
      precoP = float(input("Digite o Preço do produto R$"))


    nomeP = str(input("digite o nome do produto: "))
    if precoP <= 0:
        Totalp += precoP


    op = str(input("quer continuar [s/n]:"))
    if op == "n" or op == "N":
        break



print("=-" * 30)
print("informações sobre compra".upper())
print(" ") # linha em branco
print("O total do preços dos produtos foi {}".format(Totalp))