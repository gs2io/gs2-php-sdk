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

namespace Gs2\Realtime\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Realtime\Model\TransactionSetting;
use Gs2\Realtime\Model\TransactionSettingV2;
use Gs2\Realtime\Model\MobileNotificationMessage;
use Gs2\Realtime\Model\NotificationSetting;
use Gs2\Realtime\Model\LogSetting;

/**
 * Request for updateNamespace: Update Namespace
 *
 * @see https://docs.gs2.io/api_reference/realtime/sdk/#updatenamespace
 */
class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Description */
    private $description;
    /** @var TransactionSetting Transaction Setting */
    private $transactionSetting;
    /** @var TransactionSettingV2 Transaction Setting (V2) */
    private $transactionSettingV2;
    /** @var string Server Type */
    private $serverType;
    /** @var string Server Spec */
    private $serverSpec;
    /** @var NotificationSetting Create Notification */
    private $createNotification;
    /** @var LogSetting Log Setting */
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
     * @return TransactionSetting|null Transaction Setting
     * @deprecated
     */
	public function getTransactionSetting(): ?TransactionSetting {
		return $this->transactionSetting;
	}
    /**
     * @param TransactionSetting|null $transactionSetting Transaction Setting
     * @deprecated
     */
	public function setTransactionSetting(?TransactionSetting $transactionSetting) {
		$this->transactionSetting = $transactionSetting;
	}
    /**
     * @param TransactionSetting|null $transactionSetting Transaction Setting
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
    /** @return string|null Server Type */
	public function getServerType(): ?string {
		return $this->serverType;
	}
    /** @param string|null $serverType Server Type */
	public function setServerType(?string $serverType) {
		$this->serverType = $serverType;
	}
    /**
     * @param string|null $serverType Server Type
     * @return UpdateNamespaceRequest
     */
	public function withServerType(?string $serverType): UpdateNamespaceRequest {
		$this->serverType = $serverType;
		return $this;
	}
    /** @return string|null Server Spec */
	public function getServerSpec(): ?string {
		return $this->serverSpec;
	}
    /** @param string|null $serverSpec Server Spec */
	public function setServerSpec(?string $serverSpec) {
		$this->serverSpec = $serverSpec;
	}
    /**
     * @param string|null $serverSpec Server Spec
     * @return UpdateNamespaceRequest
     */
	public function withServerSpec(?string $serverSpec): UpdateNamespaceRequest {
		$this->serverSpec = $serverSpec;
		return $this;
	}
    /** @return NotificationSetting|null Create Notification */
	public function getCreateNotification(): ?NotificationSetting {
		return $this->createNotification;
	}
    /** @param NotificationSetting|null $createNotification Create Notification */
	public function setCreateNotification(?NotificationSetting $createNotification) {
		$this->createNotification = $createNotification;
	}
    /**
     * @param NotificationSetting|null $createNotification Create Notification
     * @return UpdateNamespaceRequest
     */
	public function withCreateNotification(?NotificationSetting $createNotification): UpdateNamespaceRequest {
		$this->createNotification = $createNotification;
		return $this;
	}
    /** @return LogSetting|null Log Setting */
	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}
    /** @param LogSetting|null $logSetting Log Setting */
	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}
    /**
     * @param LogSetting|null $logSetting Log Setting
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
            ->withServerType(array_key_exists('serverType', $data) && $data['serverType'] !== null ? $data['serverType'] : null)
            ->withServerSpec(array_key_exists('serverSpec', $data) && $data['serverSpec'] !== null ? $data['serverSpec'] : null)
            ->withCreateNotification(array_key_exists('createNotification', $data) && $data['createNotification'] !== null ? NotificationSetting::fromJson($data['createNotification']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
            "serverType" => $this->getServerType(),
            "serverSpec" => $this->getServerSpec(),
            "createNotification" => $this->getCreateNotification() !== null ? $this->getCreateNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}