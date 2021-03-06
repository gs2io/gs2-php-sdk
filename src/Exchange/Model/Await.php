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

namespace Gs2\Exchange\Model;

use Gs2\Core\Model\IModel;


class Await implements IModel {
	/**
     * @var string
	 */
	private $awaitId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $rateName;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var int
	 */
	private $count;
	/**
     * @var int
	 */
	private $exchangedAt;

	public function getAwaitId(): ?string {
		return $this->awaitId;
	}

	public function setAwaitId(?string $awaitId) {
		$this->awaitId = $awaitId;
	}

	public function withAwaitId(?string $awaitId): Await {
		$this->awaitId = $awaitId;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): Await {
		$this->userId = $userId;
		return $this;
	}

	public function getRateName(): ?string {
		return $this->rateName;
	}

	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}

	public function withRateName(?string $rateName): Await {
		$this->rateName = $rateName;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): Await {
		$this->name = $name;
		return $this;
	}

	public function getCount(): ?int {
		return $this->count;
	}

	public function setCount(?int $count) {
		$this->count = $count;
	}

	public function withCount(?int $count): Await {
		$this->count = $count;
		return $this;
	}

	public function getExchangedAt(): ?int {
		return $this->exchangedAt;
	}

	public function setExchangedAt(?int $exchangedAt) {
		$this->exchangedAt = $exchangedAt;
	}

	public function withExchangedAt(?int $exchangedAt): Await {
		$this->exchangedAt = $exchangedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Await {
        if ($data === null) {
            return null;
        }
        return (new Await())
            ->withAwaitId(empty($data['awaitId']) ? null : $data['awaitId'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withRateName(empty($data['rateName']) ? null : $data['rateName'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withCount(empty($data['count']) ? null : $data['count'])
            ->withExchangedAt(empty($data['exchangedAt']) ? null : $data['exchangedAt']);
    }

    public function toJson(): array {
        return array(
            "awaitId" => $this->getAwaitId(),
            "userId" => $this->getUserId(),
            "rateName" => $this->getRateName(),
            "name" => $this->getName(),
            "count" => $this->getCount(),
            "exchangedAt" => $this->getExchangedAt(),
        );
    }
}