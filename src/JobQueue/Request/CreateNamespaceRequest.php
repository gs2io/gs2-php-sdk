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

namespace Gs2\JobQueue\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\JobQueue\Model\TransactionSetting;
use Gs2\JobQueue\Model\TransactionSettingV2;
use Gs2\JobQueue\Model\MobileNotificationMessage;
use Gs2\JobQueue\Model\NotificationSetting;
use Gs2\JobQueue\Model\LogSetting;

/**
 * Request for createNamespace: Create Namespace
 *
 * @see https://docs.gs2.io/api_reference/job_queue/sdk/#createnamespace
 */
class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var TransactionSetting Transaction Setting */
    private $transactionSetting;
    /** @var TransactionSettingV2 Transaction Setting (V2) */
    private $transactionSettingV2;
    /** @var bool Whether to automatically execute jobs on the server side */
    private $enableAutoRun;
    /** @var NotificationSetting Push Notification */
    private $pushNotification;
    /** @var NotificationSetting Run Notification */
    private $runNotification;
    /** @var LogSetting Log Output Setting */
    private $logSetting;
    /** @return string|null Namespace name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Namespace name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Namespace name
     * @return CreateNamespaceRequest
     */
	public function withName(?string $name): CreateNamespaceRequest {
		$this->name = $name;
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
     * @return CreateNamespaceRequest
     */
	public function withDescription(?string $description): CreateNamespaceRequest {
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
     * @return CreateNamespaceRequest
     * @deprecated
     */
	public function withTransactionSetting(?TransactionSetting $transactionSetting): CreateNamespaceRequest {
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
     * @return CreateNamespaceRequest
     */
	public function withTransactionSettingV2(?TransactionSettingV2 $transactionSettingV2): CreateNamespaceRequest {
		$this->transactionSettingV2 = $transactionSettingV2;
		return $this;
	}
    /** @return bool|null Whether to automatically execute jobs on the server side */
	public function getEnableAutoRun(): ?bool {
		return $this->enableAutoRun;
	}
    /** @param bool|null $enableAutoRun Whether to automatically execute jobs on the server side */
	public function setEnableAutoRun(?bool $enableAutoRun) {
		$this->enableAutoRun = $enableAutoRun;
	}
    /**
     * @param bool|null $enableAutoRun Whether to automatically execute jobs on the server side
     * @return CreateNamespaceRequest
     */
	public function withEnableAutoRun(?bool $enableAutoRun): CreateNamespaceRequest {
		$this->enableAutoRun = $enableAutoRun;
		return $this;
	}
    /** @return NotificationSetting|null Push Notification */
	public function getPushNotification(): ?NotificationSetting {
		return $this->pushNotification;
	}
    /** @param NotificationSetting|null $pushNotification Push Notification */
	public function setPushNotification(?NotificationSetting $pushNotification) {
		$this->pushNotification = $pushNotification;
	}
    /**
     * @param NotificationSetting|null $pushNotification Push Notification
     * @return CreateNamespaceRequest
     */
	public function withPushNotification(?NotificationSetting $pushNotification): CreateNamespaceRequest {
		$this->pushNotification = $pushNotification;
		return $this;
	}
    /** @return NotificationSetting|null Run Notification */
	public function getRunNotification(): ?NotificationSetting {
		return $this->runNotification;
	}
    /** @param NotificationSetting|null $runNotification Run Notification */
	public function setRunNotification(?NotificationSetting $runNotification) {
		$this->runNotification = $runNotification;
	}
    /**
     * @param NotificationSetting|null $runNotification Run Notification
     * @return CreateNamespaceRequest
     */
	public function withRunNotification(?NotificationSetting $runNotification): CreateNamespaceRequest {
		$this->runNotification = $runNotification;
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
     * @return CreateNamespaceRequest
     */
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
            ->withTransactionSettingV2(array_key_exists('transactionSettingV2', $data) && $data['transactionSettingV2'] !== null ? TransactionSettingV2::fromJson($data['transactionSettingV2']) : null)
            ->withEnableAutoRun(array_key_exists('enableAutoRun', $data) ? $data['enableAutoRun'] : null)
            ->withPushNotification(array_key_exists('pushNotification', $data) && $data['pushNotification'] !== null ? NotificationSetting::fromJson($data['pushNotification']) : null)
            ->withRunNotification(array_key_exists('runNotification', $data) && $data['runNotification'] !== null ? NotificationSetting::fromJson($data['runNotification']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
            "enableAutoRun" => $this->getEnableAutoRun(),
            "pushNotification" => $this->getPushNotification() !== null ? $this->getPushNotification()->toJson() : null,
            "runNotification" => $this->getRunNotification() !== null ? $this->getRunNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}