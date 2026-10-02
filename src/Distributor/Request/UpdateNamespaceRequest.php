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
use Gs2\Distributor\Model\TransactionSettingV2;
use Gs2\Distributor\Model\MobileNotificationMessage;
use Gs2\Distributor\Model\NotificationSetting;
use Gs2\Distributor\Model\LogSetting;

/**
 * Request for updateNamespace: Update Namespace
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#updatenamespace
 */
class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Description */
    private $description;
    /** @var TransactionSetting Transaction Settings */
    private $transactionSetting;
    /** @var TransactionSettingV2 Transaction Setting (V2) */
    private $transactionSettingV2;
    /** @var string GS2-Identifier User GRN */
    private $assumeUserId;
    /** @var NotificationSetting Push notification when transaction auto-execution is complete(Legacy specification) */
    private $autoRunStampSheetNotification;
    /** @var NotificationSetting Push notification when transaction auto-execution is complete */
    private $autoRunTransactionNotification;
    /** @var LogSetting Log Output Setting */
    private $logSetting;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateNamespaceRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateNamespaceRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return UpdateNamespaceRequest
     */
	public function withDescription(?string $description): UpdateNamespaceRequest {
		$this->description = $description;
		return $this;
	}
    /**
     * @return TransactionSetting|null Transaction Settings
     * @deprecated
     */
	public function getTransactionSetting(): ?TransactionSetting {
		return $this->transactionSetting;
	}
    /**
     * @param TransactionSetting|null $transactionSetting Transaction Settings
     * @deprecated
     */
	public function setTransactionSetting(?TransactionSetting $transactionSetting) {
		$this->transactionSetting = $transactionSetting;
	}
    /**
     * @param TransactionSetting|null $transactionSetting Transaction Settings
     * @return UpdateNamespaceRequest
     * @deprecated
     */
	public function withTransactionSetting(?TransactionSetting $transactionSetting): UpdateNamespaceRequest {
		$this->transactionSetting = $transactionSetting;
		return $this;
	}
    /** @return TransactionSettingV2|null Transaction Setting (V2) */
	public function getTransactionSettingV2(): ?TransactionSettingV2 {
		return $this->transactionSettingV2;
	}
    /** @param TransactionSettingV2|null $transactionSettingV2 Transaction Setting (V2) */
	public function setTransactionSettingV2(?TransactionSettingV2 $transactionSettingV2) {
		$this->transactionSettingV2 = $transactionSettingV2;
	}
    /**
     * @param TransactionSettingV2|null $transactionSettingV2 Transaction Setting (V2)
     * @return UpdateNamespaceRequest
     */
	public function withTransactionSettingV2(?TransactionSettingV2 $transactionSettingV2): UpdateNamespaceRequest {
		$this->transactionSettingV2 = $transactionSettingV2;
		return $this;
	}
    /** @return string|null GS2-Identifier User GRN */
	public function getAssumeUserId(): ?string {
		return $this->assumeUserId;
	}
    /** @param string|null $assumeUserId GS2-Identifier User GRN */
	public function setAssumeUserId(?string $assumeUserId) {
		$this->assumeUserId = $assumeUserId;
	}
    /**
     * @param string|null $assumeUserId GS2-Identifier User GRN
     * @return UpdateNamespaceRequest
     */
	public function withAssumeUserId(?string $assumeUserId): UpdateNamespaceRequest {
		$this->assumeUserId = $assumeUserId;
		return $this;
	}
    /** @return NotificationSetting|null Push notification when transaction auto-execution is complete(Legacy specification) */
	public function getAutoRunStampSheetNotification(): ?NotificationSetting {
		return $this->autoRunStampSheetNotification;
	}
    /** @param NotificationSetting|null $autoRunStampSheetNotification Push notification when transaction auto-execution is complete(Legacy specification) */
	public function setAutoRunStampSheetNotification(?NotificationSetting $autoRunStampSheetNotification) {
		$this->autoRunStampSheetNotification = $autoRunStampSheetNotification;
	}
    /**
     * @param NotificationSetting|null $autoRunStampSheetNotification Push notification when transaction auto-execution is complete(Legacy specification)
     * @return UpdateNamespaceRequest
     */
	public function withAutoRunStampSheetNotification(?NotificationSetting $autoRunStampSheetNotification): UpdateNamespaceRequest {
		$this->autoRunStampSheetNotification = $autoRunStampSheetNotification;
		return $this;
	}
    /** @return NotificationSetting|null Push notification when transaction auto-execution is complete */
	public function getAutoRunTransactionNotification(): ?NotificationSetting {
		return $this->autoRunTransactionNotification;
	}
    /** @param NotificationSetting|null $autoRunTransactionNotification Push notification when transaction auto-execution is complete */
	public function setAutoRunTransactionNotification(?NotificationSetting $autoRunTransactionNotification) {
		$this->autoRunTransactionNotification = $autoRunTransactionNotification;
	}
    /**
     * @param NotificationSetting|null $autoRunTransactionNotification Push notification when transaction auto-execution is complete
     * @return UpdateNamespaceRequest
     */
	public function withAutoRunTransactionNotification(?NotificationSetting $autoRunTransactionNotification): UpdateNamespaceRequest {
		$this->autoRunTransactionNotification = $autoRunTransactionNotification;
		return $this;
	}
    /** @return LogSetting|null Log Output Setting */
	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}
    /** @param LogSetting|null $logSetting Log Output Setting */
	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}
    /**
     * @param LogSetting|null $logSetting Log Output Setting
     * @return UpdateNamespaceRequest
     */
	public function withLogSetting(?LogSetting $logSetting): UpdateNamespaceRequest {
		$this->logSetting = $logSetting;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateNamespaceRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateNamespaceRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withTransactionSetting(array_key_exists('transactionSetting', $data) && $data['transactionSetting'] !== null ? TransactionSetting::fromJson($data['transactionSetting']) : null)
            ->withTransactionSettingV2(array_key_exists('transactionSettingV2', $data) && $data['transactionSettingV2'] !== null ? TransactionSettingV2::fromJson($data['transactionSettingV2']) : null)
            ->withAssumeUserId(array_key_exists('assumeUserId', $data) && $data['assumeUserId'] !== null ? $data['assumeUserId'] : null)
            ->withAutoRunStampSheetNotification(array_key_exists('autoRunStampSheetNotification', $data) && $data['autoRunStampSheetNotification'] !== null ? NotificationSetting::fromJson($data['autoRunStampSheetNotification']) : null)
            ->withAutoRunTransactionNotification(array_key_exists('autoRunTransactionNotification', $data) && $data['autoRunTransactionNotification'] !== null ? NotificationSetting::fromJson($data['autoRunTransactionNotification']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
            "assumeUserId" => $this->getAssumeUserId(),
            "autoRunStampSheetNotification" => $this->getAutoRunStampSheetNotification() !== null ? $this->getAutoRunStampSheetNotification()->toJson() : null,
            "autoRunTransactionNotification" => $this->getAutoRunTransactionNotification() !== null ? $this->getAutoRunTransactionNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}