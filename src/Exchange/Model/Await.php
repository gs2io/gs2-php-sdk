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


/**
 * Exchange Await
 *
 * @see https://docs.gs2.io/api_reference/exchange/sdk/#await
 */
class Await implements IModel {
	/**
     * @var string Exchange Await GRN
	 */
	private $awaitId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Exchange Rate Model name
	 */
	private $rateName;
	/**
     * @var string Exchange Await name
	 */
	private $name;
	/**
     * @var int Number of exchanges
	 */
	private $count;
	/**
     * @var int Skip seconds
	 */
	private $skipSeconds;
	/**
     * @var array Default configuration values applied when obtaining rewards
	 */
	private $config;
	/**
     * @var int Time when rewards become claimable
	 */
	private $acquirableAt;
	/**
     * @var int Exchange time
	 */
	private $exchangedAt;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Exchange Await GRN */
	public function getAwaitId(): ?string {
		return $this->awaitId;
	}
    /** @param string|null $awaitId Exchange Await GRN */
	public function setAwaitId(?string $awaitId) {
		$this->awaitId = $awaitId;
	}
    /**
     * @param string|null $awaitId Exchange Await GRN
     * @return Await
     */
	public function withAwaitId(?string $awaitId): Await {
		$this->awaitId = $awaitId;
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
     * @return Await
     */
	public function withUserId(?string $userId): Await {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Exchange Rate Model name */
	public function getRateName(): ?string {
		return $this->rateName;
	}
    /** @param string|null $rateName Exchange Rate Model name */
	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}
    /**
     * @param string|null $rateName Exchange Rate Model name
     * @return Await
     */
	public function withRateName(?string $rateName): Await {
		$this->rateName = $rateName;
		return $this;
	}
    /** @return string|null Exchange Await name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Exchange Await name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Exchange Await name
     * @return Await
     */
	public function withName(?string $name): Await {
		$this->name = $name;
		return $this;
	}
    /** @return int|null Number of exchanges */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Number of exchanges */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Number of exchanges
     * @return Await
     */
	public function withCount(?int $count): Await {
		$this->count = $count;
		return $this;
	}
    /** @return int|null Skip seconds */
	public function getSkipSeconds(): ?int {
		return $this->skipSeconds;
	}
    /** @param int|null $skipSeconds Skip seconds */
	public function setSkipSeconds(?int $skipSeconds) {
		$this->skipSeconds = $skipSeconds;
	}
    /**
     * @param int|null $skipSeconds Skip seconds
     * @return Await
     */
	public function withSkipSeconds(?int $skipSeconds): Await {
		$this->skipSeconds = $skipSeconds;
		return $this;
	}
    /** @return array|null Default configuration values applied when obtaining rewards */
	public function getConfig(): ?array {
		return $this->config;
	}
    /** @param array|null $config Default configuration values applied when obtaining rewards */
	public function setConfig(?array $config) {
		$this->config = $config;
	}
    /**
     * @param array|null $config Default configuration values applied when obtaining rewards
     * @return Await
     */
	public function withConfig(?array $config): Await {
		$this->config = $config;
		return $this;
	}
    /** @return int|null Time when rewards become claimable */
	public function getAcquirableAt(): ?int {
		return $this->acquirableAt;
	}
    /** @param int|null $acquirableAt Time when rewards become claimable */
	public function setAcquirableAt(?int $acquirableAt) {
		$this->acquirableAt = $acquirableAt;
	}
    /**
     * @param int|null $acquirableAt Time when rewards become claimable
     * @return Await
     */
	public function withAcquirableAt(?int $acquirableAt): Await {
		$this->acquirableAt = $acquirableAt;
		return $this;
	}
    /** @return int|null Exchange time */
	public function getExchangedAt(): ?int {
		return $this->exchangedAt;
	}
    /** @param int|null $exchangedAt Exchange time */
	public function setExchangedAt(?int $exchangedAt) {
		$this->exchangedAt = $exchangedAt;
	}
    /**
     * @param int|null $exchangedAt Exchange time
     * @return Await
     */
	public function withExchangedAt(?int $exchangedAt): Await {
		$this->exchangedAt = $exchangedAt;
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
     * @return Await
     */
	public function withCreatedAt(?int $createdAt): Await {
		$this->createdAt = $createdAt;
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
     * @return Await
     */
	public function withRevision(?int $revision): Await {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Await {
        if ($data === null) {
            return null;
        }
        return (new Await())
            ->withAwaitId(array_key_exists('awaitId', $data) && $data['awaitId'] !== null ? $data['awaitId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withRateName(array_key_exists('rateName', $data) && $data['rateName'] !== null ? $data['rateName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null)
            ->withSkipSeconds(array_key_exists('skipSeconds', $data) && $data['skipSeconds'] !== null ? $data['skipSeconds'] : null)
            ->withConfig(!array_key_exists('config', $data) || $data['config'] === null ? null : array_map(
                function ($item) {
                    return Config::fromJson($item);
                },
                $data['config']
            ))
            ->withAcquirableAt(array_key_exists('acquirableAt', $data) && $data['acquirableAt'] !== null ? $data['acquirableAt'] : null)
            ->withExchangedAt(array_key_exists('exchangedAt', $data) && $data['exchangedAt'] !== null ? $data['exchangedAt'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "awaitId" => $this->getAwaitId(),
            "userId" => $this->getUserId(),
            "rateName" => $this->getRateName(),
            "name" => $this->getName(),
            "count" => $this->getCount(),
            "skipSeconds" => $this->getSkipSeconds(),
            "config" => $this->getConfig() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig()
            ),
            "acquirableAt" => $this->getAcquirableAt(),
            "exchangedAt" => $this->getExchangedAt(),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}