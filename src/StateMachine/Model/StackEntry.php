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
 * Stack Entry
 *
 * @see https://docs.gs2.io/api_reference/state_machine/sdk/#stackentry
 */
class StackEntry implements IModel {
	/**
     * @var string Name of the state machine
	 */
	private $stateMachineName;
	/**
     * @var string Task name
	 */
	private $taskName;
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
     * @return StackEntry
     */
	public function withStateMachineName(?string $stateMachineName): StackEntry {
		$this->stateMachineName = $stateMachineName;
		return $this;
	}
    /** @return string|null Task name */
	public function getTaskName(): ?string {
		return $this->taskName;
	}
    /** @param string|null $taskName Task name */
	public function setTaskName(?string $taskName) {
		$this->taskName = $taskName;
	}
    /**
     * @param string|null $taskName Task name
     * @return StackEntry
     */
	public function withTaskName(?string $taskName): StackEntry {
		$this->taskName = $taskName;
		return $this;
	}

    public static function fromJson(?array $data): ?StackEntry {
        if ($data === null) {
            return null;
        }
        return (new StackEntry())
            ->withStateMachineName(array_key_exists('stateMachineName', $data) && $data['stateMachineName'] !== null ? $data['stateMachineName'] : null)
            ->withTaskName(array_key_exists('taskName', $data) && $data['taskName'] !== null ? $data['taskName'] : null);
    }

    public function toJson(): array {
        return array(
            "stateMachineName" => $this->getStateMachineName(),
            "taskName" => $this->getTaskName(),
        );
    }
}