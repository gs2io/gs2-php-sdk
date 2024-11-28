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

namespace Gs2\Distributor\Model;

use Gs2\Core\Model\IModel;


class Namespace_ implements IModel {
	/**
     * @var string
	 */
	private $namespaceId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $assumeUserId;
	/**
     * @var NotificationSetting
	 */
	private $autoRunStampSheetNotification;
	/**
     * @var NotificationSetting
	 */
	private $autoRunTransactionNotification;
	/**
     * @var LogSetting
	 */
	private $logSetting;
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
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}
	public function withNamespaceId(?string $namespaceId): Namespace_ {
		$this->namespaceId = $namespaceId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): Namespace_ {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): Namespace_ {
		$this->description = $description;
		return $this;
	}
	public function getAssumeUserId(): ?string {
		return $this->assumeUserId;
	}
	public function setAssumeUserId(?string $assumeUserId) {
		$this->assumeUserId = $assumeUserId;
	}
	public function withAssumeUserId(?string $assumeUserId): Namespace_ {
		$this->assumeUserId = $assumeUserId;
		return $this;
	}
	public function getAutoRunStampSheetNotification(): ?NotificationSetting {
		return $this->autoRunStampSheetNotification;
	}
	public function setAutoRunStampSheetNotification(?NotificationSetting $autoRunStampSheetNotification) {
		$this->autoRunStampSheetNotification = $autoRunStampSheetNotification;
	}
	public function withAutoRunStampSheetNotification(?NotificationSetting $autoRunStampSheetNotification): Namespace_ {
		$this->autoRunStampSheetNotification = $autoRunStampSheetNotification;
		return $this;
	}
	public function getAutoRunTransactionNotification(): ?NotificationSetting {
		return $this->autoRunTransactionNotification;
	}
	public function setAutoRunTransactionNotification(?NotificationSetting $autoRunTransactionNotification) {
		$this->autoRunTransactionNotification = $autoRunTransactionNotification;
	}
	public function withAutoRunTransactionNotification(?NotificationSetting $autoRunTransactionNotification): Namespace_ {
		$this->autoRunTransactionNotification = $autoRunTransactionNotification;
		return $this;
	}
	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}
	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}
	public function withLogSetting(?LogSetting $logSetting): Namespace_ {
		$this->logSetting = $logSetting;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Namespace_ {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Namespace_ {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): Namespace_ {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Namespace_ {
        if ($data === null) {
            return null;
        }
        return (new Namespace_())
            ->withNamespaceId(array_key_exists('namespaceId', $data) && $data['namespaceId'] !== null ? $data['namespaceId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withAssumeUserId(array_key_exists('assumeUserId', $data) && $data['assumeUserId'] !== null ? $data['assumeUserId'] : null)
            ->withAutoRunStampSheetNotification(array_key_exists('autoRunStampSheetNotification', $data) && $data['autoRunStampSheetNotification'] !== null ? NotificationSetting::fromJson($data['autoRunStampSheetNotification']) : null)
            ->withAutoRunTransactionNotification(array_key_exists('autoRunTransactionNotification', $data) && $data['autoRunTransactionNotification'] !== null ? NotificationSetting::fromJson($data['autoRunTransactionNotification']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceId" => $this->getNamespaceId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "assumeUserId" => $this->getAssumeUserId(),
            "autoRunStampSheetNotification" => $this->getAutoRunStampSheetNotification() !== null ? $this->getAutoRunStampSheetNotification()->toJson() : null,
            "autoRunTransactionNotification" => $this->getAutoRunTransactionNotification() !== null ? $this->getAutoRunTransactionNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}