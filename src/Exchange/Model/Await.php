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
	private $skipSeconds;
	/**
     * @var array
	 */
	private $config;
	/**
     * @var int
	 */
	private $acquirableAt;
	/**
     * @var int
	 */
	private $exchangedAt;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $revision;
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
	public function getSkipSeconds(): ?int {
		return $this->skipSeconds;
	}
	public function setSkipSeconds(?int $skipSeconds) {
		$this->skipSeconds = $skipSeconds;
	}
	public function withSkipSeconds(?int $skipSeconds): Await {
		$this->skipSeconds = $skipSeconds;
		return $this;
	}
	public function getConfig(): ?array {
		return $this->config;
	}
	public function setConfig(?array $config) {
		$this->config = $config;
	}
	public function withConfig(?array $config): Await {
		$this->config = $config;
		return $this;
	}
	public function getAcquirableAt(): ?int {
		return $this->acquirableAt;
	}
	public function setAcquirableAt(?int $acquirableAt) {
		$this->acquirableAt = $acquirableAt;
	}
	public function withAcquirableAt(?int $acquirableAt): Await {
		$this->acquirableAt = $acquirableAt;
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
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Await {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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