def isPrime(n):
	if n // 2 > 2:
		for i in range(2, num // 2):
			if n % i == 0:
				return 0
	return 1


num = 60000
lar_prime = 0
for i in range(2, num):
	if isPrime(i) and num % i == 0:
		lar_prime = i
print(lar_prime)