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

namespace Gs2\JobQueue\Model;

use Gs2\Core\Model\IModel;


class DeadLetterJob implements IModel {
	/**
     * @var string
	 */
	private $deadLetterJobId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $scriptId;
	/**
     * @var string
	 */
	private $args;
	/**
     * @var array
	 */
	private $result;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getDeadLetterJobId(): ?string {
		return $this->deadLetterJobId;
	}

	public function setDeadLetterJobId(?string $deadLetterJobId) {
		$this->deadLetterJobId = $deadLetterJobId;
	}

	public function withDeadLetterJobId(?string $deadLetterJobId): DeadLetterJob {
		$this->deadLetterJobId = $deadLetterJobId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): DeadLetterJob {
		$this->name = $name;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): DeadLetterJob {
		$this->userId = $userId;
		return $this;
	}

	public function getScriptId(): ?string {
		return $this->scriptId;
	}

	public function setScriptId(?string $scriptId) {
		$this->scriptId = $scriptId;
	}

	public function withScriptId(?string $scriptId): DeadLetterJob {
		$this->scriptId = $scriptId;
		return $this;
	}

	public function getArgs(): ?string {
		return $this->args;
	}

	public function setArgs(?string $args) {
		$this->args = $args;
	}

	public function withArgs(?string $args): DeadLetterJob {
		$this->args = $args;
		return $this;
	}

	public function getResult(): ?array {
		return $this->result;
	}

	public function setResult(?array $result) {
		$this->result = $result;
	}

	public function withResult(?array $result): DeadLetterJob {
		$this->result = $result;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): DeadLetterJob {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): DeadLetterJob {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?DeadLetterJob {
        if ($data === null) {
            return null;
        }
        return (new DeadLetterJob())
            ->withDeadLetterJobId(empty($data['deadLetterJobId']) ? null : $data['deadLetterJobId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withScriptId(empty($data['scriptId']) ? null : $data['scriptId'])
            ->withArgs(empty($data['args']) ? null : $data['args'])
            ->withResult(array_map(
                function ($item) {
                    return JobResultBody::fromJson($item);
                },
                array_key_exists('result', $data) && $data['result'] !== null ? $data['result'] : []
            ))
            ->withCreatedAt(empty($data['createdAt']) && $data['createdAt'] !== 0 ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) && $data['updatedAt'] !== 0 ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "deadLetterJobId" => $this->getDeadLetterJobId(),
            "name" => $this->getName(),
            "userId" => $this->getUserId(),
            "scriptId" => $this->getScriptId(),
            "args" => $this->getArgs(),
            "result" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getResult() !== null && $this->getResult() !== null ? $this->getResult() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}