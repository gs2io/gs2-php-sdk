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

namespace Gs2\AdReward\Model;

use Gs2\Core\Model\IModel;


/**
 * Namespace
 *
 * @see https://docs.gs2.io/api_reference/ad_reward/sdk/#namespace
 */
class Namespace_ implements IModel {
	/**
     * @var string Namespace GRN
	 */
	private $namespaceId;
	/**
     * @var string Namespace name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var TransactionSetting Transaction Setting
	 */
	private $transactionSetting;
	/**
     * @var TransactionSettingV2 Transaction Setting (V2)
	 */
	private $transactionSettingV2;
	/**
     * @var AdMob AdMob settings
	 */
	private $admob;
	/**
     * @var UnityAd Unity Ads settings
	 */
	private $unityAd;
	/**
     * @var array AppLovin MAX settings
	 */
	private $appLovinMaxes;
	/**
     * @var ScriptSetting Script setting to be executed when points are acquired
	 */
	private $acquirePointScript;
	/**
     * @var ScriptSetting Script setting to be executed when points are consumed
	 */
	private $consumePointScript;
	/**
     * @var NotificationSetting Push notification when points change
	 */
	private $changePointNotification;
	/**
     * @var LogSetting Log Output Setting
	 */
	private $logSetting;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Namespace GRN */
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}
    /** @param string|null $namespaceId Namespace GRN */
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}
    /**
     * @param string|null $namespaceId Namespace GRN
     * @return Namespace_
     */
	public function withNamespaceId(?string $namespaceId): Namespace_ {
		$this->namespaceId = $namespaceId;
		return $this;
	}
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
     * @return Namespace_
     */
	public function withName(?string $name): Namespace_ {
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
     * @return Namespace_
     */
	public function withDescription(?string $description): Namespace_ {
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
     * @return Namespace_
     * @deprecated
     */
	public function withTransactionSetting(?TransactionSetting $transactionSetting): Namespace_ {
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
     * @return Namespace_
     */
	public function withTransactionSettingV2(?TransactionSettingV2 $transactionSettingV2): Namespace_ {
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
     * @return Namespace_
     */
	public function withAdmob(?AdMob $admob): Namespace_ {
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
     * @return Namespace_
     */
	public function withUnityAd(?UnityAd $unityAd): Namespace_ {
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
     * @return Namespace_
     */
	public function withAppLovinMaxes(?array $appLovinMaxes): Namespace_ {
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
     * @return Namespace_
     */
	public function withAcquirePointScript(?ScriptSetting $acquirePointScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withConsumePointScript(?ScriptSetting $consumePointScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withChangePointNotification(?NotificationSetting $changePointNotification): Namespace_ {
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
     * @return Namespace_
     */
	public function withLogSetting(?LogSetting $logSetting): Namespace_ {
		$this->logSetting = $logSetting;
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
     * @return Namespace_
     */
	public function withCreatedAt(?int $createdAt): Namespace_ {
		$this->createdAt = $createdAt;
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
     * @return Namespace_
     */
	public function withUpdatedAt(?int $updatedAt): Namespace_ {
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
     * @return Namespace_
     */
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
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}