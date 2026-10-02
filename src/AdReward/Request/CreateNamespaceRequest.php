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

namespace Gs2\AdReward\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\AdReward\Model\TransactionSetting;
use Gs2\AdReward\Model\TransactionSettingV2;
use Gs2\AdReward\Model\AdMob;
use Gs2\AdReward\Model\UnityAd;
use Gs2\AdReward\Model\AppLovinMax;
use Gs2\AdReward\Model\ScriptSetting;
use Gs2\AdReward\Model\MobileNotificationMessage;
use Gs2\AdReward\Model\NotificationSetting;
use Gs2\AdReward\Model\LogSetting;

/**
 * Request for createNamespace: Create Namespace
 *
 * @see https://docs.gs2.io/api_reference/ad_reward/sdk/#createnamespace
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
    /** @var AdMob AdMob settings */
    private $admob;
    /** @var UnityAd Unity Ads settings */
    private $unityAd;
    /** @var array AppLovin MAX settings */
    private $appLovinMaxes;
    /** @var ScriptSetting Script setting to be executed when points are acquired */
    private $acquirePointScript;
    /** @var ScriptSetting Script setting to be executed when points are consumed */
    private $consumePointScript;
    /** @var NotificationSetting Push notification when points change */
    private $changePointNotification;
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
    /** @return AdMob|null AdMob settings */
	public function getAdmob(): ?AdMob {
		return $this->admob;
	}
    /** @param AdMob|null $admob AdMob settings */
	public function setAdmob(?AdMob $admob) {
		$this->admob = $admob;
	}
    /**
     * @param AdMob|null $admob AdMob settings
     * @return CreateNamespaceRequest
     */
	public function withAdmob(?AdMob $admob): CreateNamespaceRequest {
		$this->admob = $admob;
		return $this;
	}
    /** @return UnityAd|null Unity Ads settings */
	public function getUnityAd(): ?UnityAd {
		return $this->unityAd;
	}
    /** @param UnityAd|null $unityAd Unity Ads settings */
	public function setUnityAd(?UnityAd $unityAd) {
		$this->unityAd = $unityAd;
	}
    /**
     * @param UnityAd|null $unityAd Unity Ads settings
     * @return CreateNamespaceRequest
     */
	public function withUnityAd(?UnityAd $unityAd): CreateNamespaceRequest {
		$this->unityAd = $unityAd;
		return $this;
	}
    /** @return array|null AppLovin MAX settings */
	public function getAppLovinMaxes(): ?array {
		return $this->appLovinMaxes;
	}
    /** @param array|null $appLovinMaxes AppLovin MAX settings */
	public function setAppLovinMaxes(?array $appLovinMaxes) {
		$this->appLovinMaxes = $appLovinMaxes;
	}
    /**
     * @param array|null $appLovinMaxes AppLovin MAX settings
     * @return CreateNamespaceRequest
     */
	public function withAppLovinMaxes(?array $appLovinMaxes): CreateNamespaceRequest {
		$this->appLovinMaxes = $appLovinMaxes;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when points are acquired */
	public function getAcquirePointScript(): ?ScriptSetting {
		return $this->acquirePointScript;
	}
    /** @param ScriptSetting|null $acquirePointScript Script setting to be executed when points are acquired */
	public function setAcquirePointScript(?ScriptSetting $acquirePointScript) {
		$this->acquirePointScript = $acquirePointScript;
	}
    /**
     * @param ScriptSetting|null $acquirePointScript Script setting to be executed when points are acquired
     * @return CreateNamespaceRequest
     */
	public function withAcquirePointScript(?ScriptSetting $acquirePointScript): CreateNamespaceRequest {
		$this->acquirePointScript = $acquirePointScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when points are consumed */
	public function getConsumePointScript(): ?ScriptSetting {
		return $this->consumePointScript;
	}
    /** @param ScriptSetting|null $consumePointScript Script setting to be executed when points are consumed */
	public function setConsumePointScript(?ScriptSetting $consumePointScript) {
		$this->consumePointScript = $consumePointScript;
	}
    /**
     * @param ScriptSetting|null $consumePointScript Script setting to be executed when points are consumed
     * @return CreateNamespaceRequest
     */
	public function withConsumePointScript(?ScriptSetting $consumePointScript): CreateNamespaceRequest {
		$this->consumePointScript = $consumePointScript;
		return $this;
	}
    /** @return NotificationSetting|null Push notification when points change */
	public function getChangePointNotification(): ?NotificationSetting {
		return $this->changePointNotification;
	}
    /** @param NotificationSetting|null $changePointNotification Push notification when points change */
	public function setChangePointNotification(?NotificationSetting $changePointNotification) {
		$this->changePointNotification = $changePointNotification;
	}
    /**
     * @param NotificationSetting|null $changePointNotification Push notification when points change
     * @return CreateNamespaceRequest
     */
	public function withChangePointNotification(?NotificationSetting $changePointNotification): CreateNamespaceRequest {
		$this->changePointNotification = $changePointNotification;
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
            ->withAdmob(array_key_exists('admob', $data) && $data['admob'] !== null ? AdMob::fromJson($data['admob']) : null)
            ->withUnityAd(array_key_exists('unityAd', $data) && $data['unityAd'] !== null ? UnityAd::fromJson($data['unityAd']) : null)
            ->withAppLovinMaxes(!array_key_exists('appLovinMaxes', $data) || $data['appLovinMaxes'] === null ? null : array_map(
                function ($item) {
                    return AppLovinMax::fromJson($item);
                },
                $data['appLovinMaxes']
            ))
            ->withAcquirePointScript(array_key_exists('acquirePointScript', $data) && $data['acquirePointScript'] !== null ? ScriptSetting::fromJson($data['acquirePointScript']) : null)
            ->withConsumePointScript(array_key_exists('consumePointScript', $data) && $data['consumePointScript'] !== null ? ScriptSetting::fromJson($data['consumePointScript']) : null)
            ->withChangePointNotification(array_key_exists('changePointNotification', $data) && $data['changePointNotification'] !== null ? NotificationSetting::fromJson($data['changePointNotification']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
            "admob" => $this->getAdmob() !== null ? $this->getAdmob()->toJson() : null,
            "unityAd" => $this->getUnityAd() !== null ? $this->getUnityAd()->toJson() : null,
            "appLovinMaxes" => $this->getAppLovinMaxes() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAppLovinMaxes()
            ),
            "acquirePointScript" => $this->getAcquirePointScript() !== null ? $this->getAcquirePointScript()->toJson() : null,
            "consumePointScript" => $this->getConsumePointScript() !== null ? $this->getConsumePointScript()->toJson() : null,
            "changePointNotification" => $this->getChangePointNotification() !== null ? $this->getChangePointNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}