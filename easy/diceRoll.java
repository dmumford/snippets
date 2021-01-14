/* Method that emulates a dice roll by generating
a random number between 1 and 6 */

public class diceRoll {

    // define method
    static void diceRoll() {
        int random = (int)(Math.random() * 6 + 1);
        System.out.println(random);
    }
    
    // call method
    public static void main(String[] args) {
        diceRoll();
    }
    
}
