public interface Game {

    public void maxNumber(int a, int b);
}

public class Lambda {
    public static void main(String[] args) {
        Game football = (int a, int b) -> {
            if (a > b) System.out.println("Max : " + a);
            else System.out.println("Max : " + b);
        };

        football.maxNumber(23, 44);

    }

}

