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
 * State Machine Status
 *
 * @see https://docs.gs2.io/api_reference/state_machine/sdk/#status
 */
class Status implements IModel {
	/**
     * @var string Status of State Machine GRN
	 */
	private $statusId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Status name
	 */
	private $name;
	/**
     * @var int Version
	 */
	private $stateMachineVersion;
	/**
     * @var string Whether to enable speculative execution
	 */
	private $enableSpeculativeExecution;
	/**
     * @var string State machine definition
	 */
	private $stateMachineDefinition;
	/**
     * @var RandomStatus Random status
	 */
	private $randomStatus;
	/**
     * @var array Stack
	 */
	private $stacks;
	/**
     * @var array State variables for each state machine
	 */
	private $variables;
	/**
     * @var string Status
	 */
	private $status;
	/**
     * @var string Last error
	 */
	private $lastError;
	/**
     * @var int Number of transitions
	 */
	private $transitionCount;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
    /** @return string|null Status of State Machine GRN */
	public function getStatusId(): ?string {
		return $this->statusId;
	}
    /** @param string|null $statusId Status of State Machine GRN */
	public function setStatusId(?string $statusId) {
		$this->statusId = $statusId;
	}
    /**
     * @param string|null $statusId Status of State Machine GRN
     * @return Status
     */
	public function withStatusId(?string $statusId): Status {
		$this->statusId = $statusId;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return Status
     */
	public function withUserId(?string $userId): Status {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Status name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Status name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Status name
     * @return Status
     */
	public function withName(?string $name): Status {
		$this->name = $name;
		return $this;
	}
    /** @return int|null Version */
	public function getStateMachineVersion(): ?int {
		return $this->stateMachineVersion;
	}
    /** @param int|null $stateMachineVersion Version */
	public function setStateMachineVersion(?int $stateMachineVersion) {
		$this->stateMachineVersion = $stateMachineVersion;
	}
    /**
     * @param int|null $stateMachineVersion Version
     * @return Status
     */
	public function withStateMachineVersion(?int $stateMachineVersion): Status {
		$this->stateMachineVersion = $stateMachineVersion;
		return $this;
	}
    /** @return string|null Whether to enable speculative execution */
	public function getEnableSpeculativeExecution(): ?string {
		return $this->enableSpeculativeExecution;
	}
    /** @param string|null $enableSpeculativeExecution Whether to enable speculative execution */
	public function setEnableSpeculativeExecution(?string $enableSpeculativeExecution) {
		$this->enableSpeculativeExecution = $enableSpeculativeExecution;
	}
    /**
     * @param string|null $enableSpeculativeExecution Whether to enable speculative execution
     * @return Status
     */
	public function withEnableSpeculativeExecution(?string $enableSpeculativeExecution): Status {
		$this->enableSpeculativeExecution = $enableSpeculativeExecution;
		return $this;
	}
    /** @return string|null State machine definition */
	public function getStateMachineDefinition(): ?string {
		return $this->stateMachineDefinition;
	}
    /** @param string|null $stateMachineDefinition State machine definition */
	public function setStateMachineDefinition(?string $stateMachineDefinition) {
		$this->stateMachineDefinition = $stateMachineDefinition;
	}
    /**
     * @param string|null $stateMachineDefinition State machine definition
     * @return Status
     */
	public function withStateMachineDefinition(?string $stateMachineDefinition): Status {
		$this->stateMachineDefinition = $stateMachineDefinition;
		return $this;
	}
    /** @return RandomStatus|null Random status */
	public function getRandomStatus(): ?RandomStatus {
		return $this->randomStatus;
	}
    /** @param RandomStatus|null $randomStatus Random status */
	public function setRandomStatus(?RandomStatus $randomStatus) {
		$this->randomStatus = $randomStatus;
	}
    /**
     * @param RandomStatus|null $randomStatus Random status
     * @return Status
     */
	public function withRandomStatus(?RandomStatus $randomStatus): Status {
		$this->randomStatus = $randomStatus;
		return $this;
	}
    /** @return array|null Stack */
	public function getStacks(): ?array {
		return $this->stacks;
	}
    /** @param array|null $stacks Stack */
	public function setStacks(?array $stacks) {
		$this->stacks = $stacks;
	}
    /**
     * @param array|null $stacks Stack
     * @return Status
     */
	public function withStacks(?array $stacks): Status {
		$this->stacks = $stacks;
		return $this;
	}
    /** @return array|null State variables for each state machine */
	public function getVariables(): ?array {
		return $this->variables;
	}
    /** @param array|null $variables State variables for each state machine */
	public function setVariables(?array $variables) {
		$this->variables = $variables;
	}
    /**
     * @param array|null $variables State variables for each state machine
     * @return Status
     */
	public function withVariables(?array $variables): Status {
		$this->variables = $variables;
		return $this;
	}
    /** @return string|null Status */
	public function getStatus(): ?string {
		return $this->status;
	}
    /** @param string|null $status Status */
	public function setStatus(?string $status) {
		$this->status = $status;
	}
    /**
     * @param string|null $status Status
     * @return Status
     */
	public function withStatus(?string $status): Status {
		$this->status = $status;
		return $this;
	}
    /** @return string|null Last error */
	public function getLastError(): ?string {
		return $this->lastError;
	}
    /** @param string|null $lastError Last error */
	public function setLastError(?string $lastError) {
		$this->lastError = $lastError;
	}
    /**
     * @param string|null $lastError Last error
     * @return Status
     */
	public function withLastError(?string $lastError): Status {
		$this->lastError = $lastError;
		return $this;
	}
    /** @return int|null Number of transitions */
	public function getTransitionCount(): ?int {
		return $this->transitionCount;
	}
    /** @param int|null $transitionCount Number of transitions */
	public function setTransitionCount(?int $transitionCount) {
		$this->transitionCount = $transitionCount;
	}
    /**
     * @param int|null $transitionCount Number of transitions
     * @return Status
     */
	public function withTransitionCount(?int $transitionCount): Status {
		$this->transitionCount = $transitionCount;
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
     * @return Status
     */
	public function withCreatedAt(?int $createdAt): Status {
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
     * @return Status
     */
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
            ->withEnableSpeculativeExecution(array_key_exists('enableSpeculativeExecution', $data) && $data['enableSpeculativeExecution'] !== null ? $data['enableSpeculativeExecution'] : null)
            ->withStateMachineDefinition(array_key_exists('stateMachineDefinition', $data) && $data['stateMachineDefinition'] !== null ? $data['stateMachineDefinition'] : null)
            ->withRandomStatus(array_key_exists('randomStatus', $data) && $data['randomStatus'] !== null ? RandomStatus::fromJson($data['randomStatus']) : null)
            ->withStacks(!array_key_exists('stacks', $data) || $data['stacks'] === null ? null : array_map(
                function ($item) {
                    return StackEntry::fromJson($item);
                },
                $data['stacks']
            ))
            ->withVariables(!array_key_exists('variables', $data) || $data['variables'] === null ? null : array_map(
                function ($item) {
                    return Variable::fromJson($item);
                },
                $data['variables']
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
            "enableSpeculativeExecution" => $this->getEnableSpeculativeExecution(),
            "stateMachineDefinition" => $this->getStateMachineDefinition(),
            "randomStatus" => $this->getRandomStatus() !== null ? $this->getRandomStatus()->toJson() : null,
            "stacks" => $this->getStacks() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getStacks()
            ),
            "variables" => $this->getVariables() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getVariables()
            ),
            "status" => $this->getStatus(),
            "lastError" => $this->getLastError(),
            "transitionCount" => $this->getTransitionCount(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}