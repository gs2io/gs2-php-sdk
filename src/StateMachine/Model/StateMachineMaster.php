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
 * State machine definition
 *
 * @see https://docs.gs2.io/api_reference/state_machine/sdk/#statemachinemaster
 */
class StateMachineMaster implements IModel {
	/**
     * @var string State Machine Master GRN
	 */
	private $stateMachineId;
	/**
     * @var string Main state machine name
	 */
	private $mainStateMachineName;
	/**
     * @var string State machine definition
	 */
	private $payload;
	/**
     * @var int Version
	 */
	private $version;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null State Machine Master GRN */
	public function getStateMachineId(): ?string {
		return $this->stateMachineId;
	}
    /** @param string|null $stateMachineId State Machine Master GRN */
	public function setStateMachineId(?string $stateMachineId) {
		$this->stateMachineId = $stateMachineId;
	}
    /**
     * @param string|null $stateMachineId State Machine Master GRN
     * @return StateMachineMaster
     */
	public function withStateMachineId(?string $stateMachineId): StateMachineMaster {
		$this->stateMachineId = $stateMachineId;
		return $this;
	}
    /** @return string|null Main state machine name */
	public function getMainStateMachineName(): ?string {
		return $this->mainStateMachineName;
	}
    /** @param string|null $mainStateMachineName Main state machine name */
	public function setMainStateMachineName(?string $mainStateMachineName) {
		$this->mainStateMachineName = $mainStateMachineName;
	}
    /**
     * @param string|null $mainStateMachineName Main state machine name
     * @return StateMachineMaster
     */
	public function withMainStateMachineName(?string $mainStateMachineName): StateMachineMaster {
		$this->mainStateMachineName = $mainStateMachineName;
		return $this;
	}
    /** @return string|null State machine definition */
	public function getPayload(): ?string {
		return $this->payload;
	}
    /** @param string|null $payload State machine definition */
	public function setPayload(?string $payload) {
		$this->payload = $payload;
	}
    /**
     * @param string|null $payload State machine definition
     * @return StateMachineMaster
     */
	public function withPayload(?string $payload): StateMachineMaster {
		$this->payload = $payload;
		return $this;
	}
    /** @return int|null Version */
	public function getVersion(): ?int {
		return $this->version;
	}
    /** @param int|null $version Version */
	public function setVersion(?int $version) {
		$this->version = $version;
	}
    /**
     * @param int|null $version Version
     * @return StateMachineMaster
     */
	public function withVersion(?int $version): StateMachineMaster {
		$this->version = $version;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return StateMachineMaster
     */
	public function withCreatedAt(?int $createdAt): StateMachineMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return StateMachineMaster
     */
	public function withUpdatedAt(?int $updatedAt): StateMachineMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return StateMachineMaster
     */
	public function withRevision(?int $revision): StateMachineMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?StateMachineMaster {
        if ($data === null) {
            return null;
        }
        return (new StateMachineMaster())
            ->withStateMachineId(array_key_exists('stateMachineId', $data) && $data['stateMachineId'] !== null ? $data['stateMachineId'] : null)
            ->withMainStateMachineName(array_key_exists('mainStateMachineName', $data) && $data['mainStateMachineName'] !== null ? $data['mainStateMachineName'] : null)
            ->withPayload(array_key_exists('payload', $data) && $data['payload'] !== null ? $data['payload'] : null)
            ->withVersion(array_key_exists('version', $data) && $data['version'] !== null ? $data['version'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "stateMachineId" => $this->getStateMachineId(),
            "mainStateMachineName" => $this->getMainStateMachineName(),
            "payload" => $this->getPayload(),
            "version" => $this->getVersion(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}