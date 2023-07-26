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


class Status implements IModel {
	/**
     * @var string
	 */
	private $statusId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var int
	 */
	private $stateMachineVersion;
	/**
     * @var array
	 */
	private $stacks;
	/**
     * @var array
	 */
	private $variables;
	/**
     * @var string
	 */
	private $status;
	/**
     * @var string
	 */
	private $lastError;
	/**
     * @var int
	 */
	private $transitionCount;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getStatusId(): ?string {
		return $this->statusId;
	}
	public function setStatusId(?string $statusId) {
		$this->statusId = $statusId;
	}
	public function withStatusId(?string $statusId): Status {
		$this->statusId = $statusId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Status {
		$this->userId = $userId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): Status {
		$this->name = $name;
		return $this;
	}
	public function getStateMachineVersion(): ?int {
		return $this->stateMachineVersion;
	}
	public function setStateMachineVersion(?int $stateMachineVersion) {
		$this->stateMachineVersion = $stateMachineVersion;
	}
	public function withStateMachineVersion(?int $stateMachineVersion): Status {
		$this->stateMachineVersion = $stateMachineVersion;
		return $this;
	}
	public function getStacks(): ?array {
		return $this->stacks;
	}
	public function setStacks(?array $stacks) {
		$this->stacks = $stacks;
	}
	public function withStacks(?array $stacks): Status {
		$this->stacks = $stacks;
		return $this;
	}
	public function getVariables(): ?array {
		return $this->variables;
	}
	public function setVariables(?array $variables) {
		$this->variables = $variables;
	}
	public function withVariables(?array $variables): Status {
		$this->variables = $variables;
		return $this;
	}
	public function getStatus(): ?string {
		return $this->status;
	}
	public function setStatus(?string $status) {
		$this->status = $status;
	}
	public function withStatus(?string $status): Status {
		$this->status = $status;
		return $this;
	}
	public function getLastError(): ?string {
		return $this->lastError;
	}
	public function setLastError(?string $lastError) {
		$this->lastError = $lastError;
	}
	public function withLastError(?string $lastError): Status {
		$this->lastError = $lastError;
		return $this;
	}
	public function getTransitionCount(): ?int {
		return $this->transitionCount;
	}
	public function setTransitionCount(?int $transitionCount) {
		$this->transitionCount = $transitionCount;
	}
	public function withTransitionCount(?int $transitionCount): Status {
		$this->transitionCount = $transitionCount;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Status {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Status {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Status {
        if ($data === null) {
            return null;
        }
        return (new Status())
            ->withStatusId(array_key_exists('statusId', $data) && $data['statusId'] !== null ? $data['statusId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withStateMachineVersion(array_key_exists('stateMachineVersion', $data) && $data['stateMachineVersion'] !== null ? $data['stateMachineVersion'] : null)
            ->withStacks(array_map(
                function ($item) {
                    return StackEntry::fromJson($item);
                },
                array_key_exists('stacks', $data) && $data['stacks'] !== null ? $data['stacks'] : []
            ))
            ->withVariables(array_map(
                function ($item) {
                    return Variable::fromJson($item);
                },
                array_key_exists('variables', $data) && $data['variables'] !== null ? $data['variables'] : []
            ))
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? $data['status'] : null)
            ->withLastError(array_key_exists('lastError', $data) && $data['lastError'] !== null ? $data['lastError'] : null)
            ->withTransitionCount(array_key_exists('transitionCount', $data) && $data['transitionCount'] !== null ? $data['transitionCount'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "statusId" => $this->getStatusId(),
            "userId" => $this->getUserId(),
            "name" => $this->getName(),
            "stateMachineVersion" => $this->getStateMachineVersion(),
            "stacks" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getStacks() !== null && $this->getStacks() !== null ? $this->getStacks() : []
            ),
            "variables" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getVariables() !== null && $this->getVariables() !== null ? $this->getVariables() : []
            ),
            "status" => $this->getStatus(),
            "lastError" => $this->getLastError(),
            "transitionCount" => $this->getTransitionCount(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}