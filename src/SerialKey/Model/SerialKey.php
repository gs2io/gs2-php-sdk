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

namespace Gs2\SerialKey\Model;

use Gs2\Core\Model\IModel;


class SerialKey implements IModel {
	/**
     * @var string
	 */
	private $serialKeyId;
	/**
     * @var string
	 */
	private $campaignModelName;
	/**
     * @var string
	 */
	private $code;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var string
	 */
	private $status;
	/**
     * @var string
	 */
	private $usedUserId;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $usedAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getSerialKeyId(): ?string {
		return $this->serialKeyId;
	}
	public function setSerialKeyId(?string $serialKeyId) {
		$this->serialKeyId = $serialKeyId;
	}
	public function withSerialKeyId(?string $serialKeyId): SerialKey {
		$this->serialKeyId = $serialKeyId;
		return $this;
	}
	public function getCampaignModelName(): ?string {
		return $this->campaignModelName;
	}
	public function setCampaignModelName(?string $campaignModelName) {
		$this->campaignModelName = $campaignModelName;
	}
	public function withCampaignModelName(?string $campaignModelName): SerialKey {
		$this->campaignModelName = $campaignModelName;
		return $this;
	}
	public function getCode(): ?string {
		return $this->code;
	}
	public function setCode(?string $code) {
		$this->code = $code;
	}
	public function withCode(?string $code): SerialKey {
		$this->code = $code;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): SerialKey {
		$this->metadata = $metadata;
		return $this;
	}
	public function getStatus(): ?string {
		return $this->status;
	}
	public function setStatus(?string $status) {
		$this->status = $status;
	}
	public function withStatus(?string $status): SerialKey {
		$this->status = $status;
		return $this;
	}
	public function getUsedUserId(): ?string {
		return $this->usedUserId;
	}
	public function setUsedUserId(?string $usedUserId) {
		$this->usedUserId = $usedUserId;
	}
	public function withUsedUserId(?string $usedUserId): SerialKey {
		$this->usedUserId = $usedUserId;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): SerialKey {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUsedAt(): ?int {
		return $this->usedAt;
	}
	public function setUsedAt(?int $usedAt) {
		$this->usedAt = $usedAt;
	}
	public function withUsedAt(?int $usedAt): SerialKey {
		$this->usedAt = $usedAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): SerialKey {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?SerialKey {
        if ($data === null) {
            return null;
        }
        return (new SerialKey())
            ->withSerialKeyId(array_key_exists('serialKeyId', $data) && $data['serialKeyId'] !== null ? $data['serialKeyId'] : null)
            ->withCampaignModelName(array_key_exists('campaignModelName', $data) && $data['campaignModelName'] !== null ? $data['campaignModelName'] : null)
            ->withCode(array_key_exists('code', $data) && $data['code'] !== null ? $data['code'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? $data['status'] : null)
            ->withUsedUserId(array_key_exists('usedUserId', $data) && $data['usedUserId'] !== null ? $data['usedUserId'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUsedAt(array_key_exists('usedAt', $data) && $data['usedAt'] !== null ? $data['usedAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "serialKeyId" => $this->getSerialKeyId(),
            "campaignModelName" => $this->getCampaignModelName(),
            "code" => $this->getCode(),
            "metadata" => $this->getMetadata(),
            "status" => $this->getStatus(),
            "usedUserId" => $this->getUsedUserId(),
            "createdAt" => $this->getCreatedAt(),
            "usedAt" => $this->getUsedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}