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
barato = 0
maisde1 = 0
nome_barato = ""
while True:
    precoP = 0

    while precoP <= 0:
      precoP = float(input("Digite o Preço do produto R$"))


    nomeP = str(input("digite o nome do produto: "))

    Totalp += precoP


    if precoP > 1000:
        maisde1 += 1

    if precoP < barato or barato == 0:
        barato = precoP
        nome_barato = nomeP


    op = str(input("quer continuar [s/n]:"))
    if op == "n" or op == "N":
        break

print("=-" * 30)
print("informações sobre compra".upper())
print(" ") # linha em branco
print("O total do preços dos produtos foi R${:.2f}".format(Totalp))
print("O produto mais barato que voce digitou foi {} por R${}".format(nome_barato,barato))
print("Há {} Produtos que custam mais de R$1000".format(maisde1))