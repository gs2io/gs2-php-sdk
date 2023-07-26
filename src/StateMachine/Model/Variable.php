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


class Variable implements IModel {
	/**
     * @var string
	 */
	private $stateMachineName;
	/**
     * @var string
	 */
	private $value;
	public function getStateMachineName(): ?string {
		return $this->stateMachineName;
	}
	public function setStateMachineName(?string $stateMachineName) {
		$this->stateMachineName = $stateMachineName;
	}
	public function withStateMachineName(?string $stateMachineName): Variable {
		$this->stateMachineName = $stateMachineName;
		return $this;
	}
	public function getValue(): ?string {
		return $this->value;
	}
	public function setValue(?string $value) {
		$this->value = $value;
	}
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