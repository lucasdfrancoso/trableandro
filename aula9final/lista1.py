# Definir as variáveis X1 e X2
x1 = 0.537863e6
x2 = 0.5379e6

# Calcular o Erro Absoluto (EA)
EA = x1 - x2

# Se EA for negativo, multiplicar por -1 para torná-lo positivo
if EA < 0:
    EA = EA * -1

# Exibir o valor do Erro Absoluto
print(f"Erro Absoluto (EA): {EA}")

# Calcular o Erro Relativo (ER)
ER = EA / x2

# Exibir o valor do Erro Relativo
print(f"Erro Relativo (ER): {ER}")
