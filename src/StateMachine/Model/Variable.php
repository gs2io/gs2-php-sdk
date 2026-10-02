<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\StateMachine\Model;

use Gs2\Core\Model\IModel;


/**
 * State variables per state machine
 *
 * @see https://docs.gs2.io/api_reference/state_machine/sdk/#variable
 */
class Variable implements IModel {
	/**
     * @var string Name of the state machine
	 */
	private $stateMachineName;
	/**
     * @var string Value
	 */
	private $value;
    /** @return string|null Name of the state machine */
	public function getStateMachineName(): ?string {
		return $this->stateMachineName;
	}
    /** @param string|null $stateMachineName Name of the state machine */
	public function setStateMachineName(?string $stateMachineName) {
		$this->stateMachineName = $stateMachineName;
	}
    /**
     * @param string|null $stateMachineName Name of the state machine
     * @return Variable
     */
	public function withStateMachineName(?string $stateMachineName): Variable {
		$this->stateMachineName = $stateMachineName;
		return $this;
	}
    /** @return string|null Value */
	public function getValue(): ?string {
		return $this->value;
	}
    /** @param string|null $value Value */
	public function setValue(?string $value) {
		$this->value = $value;
	}
    /**
     * @param string|null $value Value
     * @return Variable
     */
	public function withValue(?string $value): Variable {
		$this->value = $value;
		return $this;
	}

    public static function fromJson(?array $data): ?Variable {
        if ($data === null) {
            return null;
        }
        return (new Variable())
            ->withStateMachineName(array_key_exists('stateMachineName', $data) && $data['stateMachineName'] !== null ? $data['stateMachineName'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null);
    }

    public function toJson(): array {
        return array(
            "stateMachineName" => $this->getStateMachineName(),
            "value" => $this->getValue(),
        );
    }
}