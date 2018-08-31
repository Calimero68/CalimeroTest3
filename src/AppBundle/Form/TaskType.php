<?php
// src/AppBundle/Form/TaskType.php
namespace AppBundle\Form;

use AppBundle\Entity\Task;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
	// le formulaire est créé ici, et il est appelé par le controller
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('task')
            ->add('dueDate', null, array('widget' => 'single_text'))
			->add('agreeTerms', CheckboxType::class, array('mapped' => false)) // mapped false permet de dire que agreeTerms ne fait pas parti de la class Task
            ->add('save', SubmitType::class)
        ;
    }
	
	// permet de spécifier à quelle class fait référence le formulaire.
	// le controller fait le lien tout seul parce que $task = Task mais il vaut mieux le spécifier
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => Task::class,
		));
	}
}
?>