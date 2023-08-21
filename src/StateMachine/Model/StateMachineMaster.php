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


class StateMachineMaster implements IModel {
	/**
     * @var string
	 */
	private $stateMachineId;
	/**
     * @var string
	 */
	private $mainStateMachineName;
	/**
     * @var string
	 */
	private $payload;
	/**
     * @var int
	 */
	private $version;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getStateMachineId(): ?string {
		return $this->stateMachineId;
	}
	public function setStateMachineId(?string $stateMachineId) {
		$this->stateMachineId = $stateMachineId;
	}
	public function withStateMachineId(?string $stateMachineId): StateMachineMaster {
		$this->stateMachineId = $stateMachineId;
		return $this;
	}
	public function getMainStateMachineName(): ?string {
		return $this->mainStateMachineName;
	}
	public function setMainStateMachineName(?string $mainStateMachineName) {
		$this->mainStateMachineName = $mainStateMachineName;
	}
	public function withMainStateMachineName(?string $mainStateMachineName): StateMachineMaster {
		$this->mainStateMachineName = $mainStateMachineName;
		return $this;
	}
	public function getPayload(): ?string {
		return $this->payload;
	}
	public function setPayload(?string $payload) {
		$this->payload = $payload;
	}
	public function withPayload(?string $payload): StateMachineMaster {
		$this->payload = $payload;
		return $this;
	}
	public function getVersion(): ?int {
		return $this->version;
	}
	public function setVersion(?int $version) {
		$this->version = $version;
	}
	public function withVersion(?int $version): StateMachineMaster {
		$this->version = $version;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): StateMachineMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): StateMachineMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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