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


/**
 * Serial Code
 *
 * @see https://docs.gs2.io/api_reference/serial_key/sdk/#serialkey
 */
class SerialKey implements IModel {
	/**
     * @var string Serial Key GRN
	 */
	private $serialKeyId;
	/**
     * @var string Campaign name
	 */
	private $campaignModelName;
	/**
     * @var string Serial Code
	 */
	private $code;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var string Status
	 */
	private $status;
	/**
     * @var string User ID
	 */
	private $usedUserId;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Used at
	 */
	private $usedAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Serial Key GRN */
	public function getSerialKeyId(): ?string {
		return $this->serialKeyId;
	}
    /** @param string|null $serialKeyId Serial Key GRN */
	public function setSerialKeyId(?string $serialKeyId) {
		$this->serialKeyId = $serialKeyId;
	}
    /**
     * @param string|null $serialKeyId Serial Key GRN
     * @return SerialKey
     */
	public function withSerialKeyId(?string $serialKeyId): SerialKey {
		$this->serialKeyId = $serialKeyId;
		return $this;
	}
    /** @return string|null Campaign name */
	public function getCampaignModelName(): ?string {
		return $this->campaignModelName;
	}
    /** @param string|null $campaignModelName Campaign name */
	public function setCampaignModelName(?string $campaignModelName) {
		$this->campaignModelName = $campaignModelName;
	}
    /**
     * @param string|null $campaignModelName Campaign name
     * @return SerialKey
     */
	public function withCampaignModelName(?string $campaignModelName): SerialKey {
		$this->campaignModelName = $campaignModelName;
		return $this;
	}
    /** @return string|null Serial Code */
	public function getCode(): ?string {
		return $this->code;
	}
    /** @param string|null $code Serial Code */
	public function setCode(?string $code) {
		$this->code = $code;
	}
    /**
     * @param string|null $code Serial Code
     * @return SerialKey
     */
	public function withCode(?string $code): SerialKey {
		$this->code = $code;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return SerialKey
     */
	public function withMetadata(?string $metadata): SerialKey {
		$this->metadata = $metadata;
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
     * @return SerialKey
     */
	public function withStatus(?string $status): SerialKey {
		$this->status = $status;
		return $this;
	}
    /** @return string|null User ID */
	public function getUsedUserId(): ?string {
		return $this->usedUserId;
	}
    /** @param string|null $usedUserId User ID */
	public function setUsedUserId(?string $usedUserId) {
		$this->usedUserId = $usedUserId;
	}
    /**
     * @param string|null $usedUserId User ID
     * @return SerialKey
     */
	public function withUsedUserId(?string $usedUserId): SerialKey {
		$this->usedUserId = $usedUserId;
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
     * @return SerialKey
     */
	public function withCreatedAt(?int $createdAt): SerialKey {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Used at */
	public function getUsedAt(): ?int {
		return $this->usedAt;
	}
    /** @param int|null $usedAt Used at */
	public function setUsedAt(?int $usedAt) {
		$this->usedAt = $usedAt;
	}
    /**
     * @param int|null $usedAt Used at
     * @return SerialKey
     */
	public function withUsedAt(?int $usedAt): SerialKey {
		$this->usedAt = $usedAt;
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
     * @return SerialKey
     */
	public function withUpdatedAt(?int $updatedAt): SerialKey {
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
     * @return SerialKey
     */
	public function withRevision(?int $revision): SerialKey {
		$this->revision = $revision;
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
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
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
            "revision" => $this->getRevision(),
        );
    }
}