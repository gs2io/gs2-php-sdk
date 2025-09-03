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

namespace Gs2\Distributor\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Distributor\Model\TransactionSetting;
use Gs2\Distributor\Model\NotificationSetting;
use Gs2\Distributor\Model\LogSetting;

class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var TransactionSetting */
    private $transactionSetting;
    /** @var string */
    private $assumeUserId;
    /** @var NotificationSetting */
    private $autoRunStampSheetNotification;
    /** @var NotificationSetting */
    private $autoRunTransactionNotification;
    /** @var LogSetting */
    private $logSetting;
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): CreateNamespaceRequest {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): CreateNamespaceRequest {
		$this->description = $description;
		return $this;
	}
	public function getTransactionSetting(): ?TransactionSetting {
		return $this->transactionSetting;
	}
	public function setTransactionSetting(?TransactionSetting $transactionSetting) {
		$this->transactionSetting = $transactionSetting;
	}
	public function withTransactionSetting(?TransactionSetting $transactionSetting): CreateNamespaceRequest {
		$this->transactionSetting = $transactionSetting;
		return $this;
	}
	public function getAssumeUserId(): ?string {
		return $this->assumeUserId;
	}
	public function setAssumeUserId(?string $assumeUserId) {
		$this->assumeUserId = $assumeUserId;
	}
	public function withAssumeUserId(?string $assumeUserId): CreateNamespaceRequest {
		$this->assumeUserId = $assumeUserId;
		return $this;
	}
	public function getAutoRunStampSheetNotification(): ?NotificationSetting {
		return $this->autoRunStampSheetNotification;
	}
	public function setAutoRunStampSheetNotification(?NotificationSetting $autoRunStampSheetNotification) {
		$this->autoRunStampSheetNotification = $autoRunStampSheetNotification;
	}
	public function withAutoRunStampSheetNotification(?NotificationSetting $autoRunStampSheetNotification): CreateNamespaceRequest {
		$this->autoRunStampSheetNotification = $autoRunStampSheetNotification;
		return $this;
	}
	public function getAutoRunTransactionNotification(): ?NotificationSetting {
		return $this->autoRunTransactionNotification;
	}
	public function setAutoRunTransactionNotification(?NotificationSetting $autoRunTransactionNotification) {
		$this->autoRunTransactionNotification = $autoRunTransactionNotification;
	}
	public function withAutoRunTransactionNotification(?NotificationSetting $autoRunTransactionNotification): CreateNamespaceRequest {
		$this->autoRunTransactionNotification = $autoRunTransactionNotification;
		return $this;
	}
	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}
	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}
	public function withLogSetting(?LogSetting $logSetting): CreateNamespaceRequest {
		$this->logSetting = $logSetting;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateNamespaceRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateNamespaceRequest())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withTransactionSetting(array_key_exists('transactionSetting', $data) && $data['transactionSetting'] !== null ? TransactionSetting::fromJson($data['transactionSetting']) : null)
            ->withAssumeUserId(array_key_exists('assumeUserId', $data) && $data['assumeUserId'] !== null ? $data['assumeUserId'] : null)
            ->withAutoRunStampSheetNotification(array_key_exists('autoRunStampSheetNotification', $data) && $data['autoRunStampSheetNotification'] !== null ? NotificationSetting::fromJson($data['autoRunStampSheetNotification']) : null)
            ->withAutoRunTransactionNotification(array_key_exists('autoRunTransactionNotification', $data) && $data['autoRunTransactionNotification'] !== null ? NotificationSetting::fromJson($data['autoRunTransactionNotification']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "assumeUserId" => $this->getAssumeUserId(),
            "autoRunStampSheetNotification" => $this->getAutoRunStampSheetNotification() !== null ? $this->getAutoRunStampSheetNotification()->toJson() : null,
            "autoRunTransactionNotification" => $this->getAutoRunTransactionNotification() !== null ? $this->getAutoRunTransactionNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}