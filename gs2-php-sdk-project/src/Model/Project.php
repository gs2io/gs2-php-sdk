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

namespace Gs2\Project\Model;

use Gs2\Core\Model\IModel;

/**
 * プロジェクト
 *
 * @author Game Server Services, Inc.
 *
 */
class Project implements IModel {
	/**
     * @var string プロジェクト
	 */
	protected $projectId;

	/**
	 * プロジェクトを取得
	 *
	 * @return string|null プロジェクト
	 */
	public function getProjectId(): ?string {
		return $this->projectId;
	}

	/**
	 * プロジェクトを設定
	 *
	 * @param string|null $projectId プロジェクト
	 */
	public function setProjectId(?string $projectId) {
		$this->projectId = $projectId;
	}

	/**
	 * プロジェクトを設定
	 *
	 * @param string|null $projectId プロジェクト
	 * @return Project $this
	 */
	public function withProjectId(?string $projectId): Project {
		$this->projectId = $projectId;
		return $this;
	}
	/**
     * @var string GS2アカウントの名前
	 */
	protected $accountName;

	/**
	 * GS2アカウントの名前を取得
	 *
	 * @return string|null GS2アカウントの名前
	 */
	public function getAccountName(): ?string {
		return $this->accountName;
	}

	/**
	 * GS2アカウントの名前を設定
	 *
	 * @param string|null $accountName GS2アカウントの名前
	 */
	public function setAccountName(?string $accountName) {
		$this->accountName = $accountName;
	}

	/**
	 * GS2アカウントの名前を設定
	 *
	 * @param string|null $accountName GS2アカウントの名前
	 * @return Project $this
	 */
	public function withAccountName(?string $accountName): Project {
		$this->accountName = $accountName;
		return $this;
	}
	/**
     * @var string プロジェクト名
	 */
	protected $name;

	/**
	 * プロジェクト名を取得
	 *
	 * @return string|null プロジェクト名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * プロジェクト名を設定
	 *
	 * @param string|null $name プロジェクト名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * プロジェクト名を設定
	 *
	 * @param string|null $name プロジェクト名
	 * @return Project $this
	 */
	public function withName(?string $name): Project {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string プロジェクトの説明
	 */
	protected $description;

	/**
	 * プロジェクトの説明を取得
	 *
	 * @return string|null プロジェクトの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * プロジェクトの説明を設定
	 *
	 * @param string|null $description プロジェクトの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * プロジェクトの説明を設定
	 *
	 * @param string|null $description プロジェクトの説明
	 * @return Project $this
	 */
	public function withDescription(?string $description): Project {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string 契約プラン
	 */
	protected $plan;

	/**
	 * 契約プランを取得
	 *
	 * @return string|null 契約プラン
	 */
	public function getPlan(): ?string {
		return $this->plan;
	}

	/**
	 * 契約プランを設定
	 *
	 * @param string|null $plan 契約プラン
	 */
	public function setPlan(?string $plan) {
		$this->plan = $plan;
	}

	/**
	 * 契約プランを設定
	 *
	 * @param string|null $plan 契約プラン
	 * @return Project $this
	 */
	public function withPlan(?string $plan): Project {
		$this->plan = $plan;
		return $this;
	}
	/**
     * @var string 支払い方法名
	 */
	protected $billingMethodName;

	/**
	 * 支払い方法名を取得
	 *
	 * @return string|null 支払い方法名
	 */
	public function getBillingMethodName(): ?string {
		return $this->billingMethodName;
	}

	/**
	 * 支払い方法名を設定
	 *
	 * @param string|null $billingMethodName 支払い方法名
	 */
	public function setBillingMethodName(?string $billingMethodName) {
		$this->billingMethodName = $billingMethodName;
	}

	/**
	 * 支払い方法名を設定
	 *
	 * @param string|null $billingMethodName 支払い方法名
	 * @return Project $this
	 */
	public function withBillingMethodName(?string $billingMethodName): Project {
		$this->billingMethodName = $billingMethodName;
		return $this;
	}
	/**
     * @var string AWS EventBridge の設定
	 */
	protected $enableEventBridge;

	/**
	 * AWS EventBridge の設定を取得
	 *
	 * @return string|null AWS EventBridge の設定
	 */
	public function getEnableEventBridge(): ?string {
		return $this->enableEventBridge;
	}

	/**
	 * AWS EventBridge の設定を設定
	 *
	 * @param string|null $enableEventBridge AWS EventBridge の設定
	 */
	public function setEnableEventBridge(?string $enableEventBridge) {
		$this->enableEventBridge = $enableEventBridge;
	}

	/**
	 * AWS EventBridge の設定を設定
	 *
	 * @param string|null $enableEventBridge AWS EventBridge の設定
	 * @return Project $this
	 */
	public function withEnableEventBridge(?string $enableEventBridge): Project {
		$this->enableEventBridge = $enableEventBridge;
		return $this;
	}
	/**
     * @var string 通知に使用するAWSアカウントのID
	 */
	protected $eventBridgeAwsAccountId;

	/**
	 * 通知に使用するAWSアカウントのIDを取得
	 *
	 * @return string|null 通知に使用するAWSアカウントのID
	 */
	public function getEventBridgeAwsAccountId(): ?string {
		return $this->eventBridgeAwsAccountId;
	}

	/**
	 * 通知に使用するAWSアカウントのIDを設定
	 *
	 * @param string|null $eventBridgeAwsAccountId 通知に使用するAWSアカウントのID
	 */
	public function setEventBridgeAwsAccountId(?string $eventBridgeAwsAccountId) {
		$this->eventBridgeAwsAccountId = $eventBridgeAwsAccountId;
	}

	/**
	 * 通知に使用するAWSアカウントのIDを設定
	 *
	 * @param string|null $eventBridgeAwsAccountId 通知に使用するAWSアカウントのID
	 * @return Project $this
	 */
	public function withEventBridgeAwsAccountId(?string $eventBridgeAwsAccountId): Project {
		$this->eventBridgeAwsAccountId = $eventBridgeAwsAccountId;
		return $this;
	}
	/**
     * @var string 通知に使用するAWSリージョン
	 */
	protected $eventBridgeAwsRegion;

	/**
	 * 通知に使用するAWSリージョンを取得
	 *
	 * @return string|null 通知に使用するAWSリージョン
	 */
	public function getEventBridgeAwsRegion(): ?string {
		return $this->eventBridgeAwsRegion;
	}

	/**
	 * 通知に使用するAWSリージョンを設定
	 *
	 * @param string|null $eventBridgeAwsRegion 通知に使用するAWSリージョン
	 */
	public function setEventBridgeAwsRegion(?string $eventBridgeAwsRegion) {
		$this->eventBridgeAwsRegion = $eventBridgeAwsRegion;
	}

	/**
	 * 通知に使用するAWSリージョンを設定
	 *
	 * @param string|null $eventBridgeAwsRegion 通知に使用するAWSリージョン
	 * @return Project $this
	 */
	public function withEventBridgeAwsRegion(?string $eventBridgeAwsRegion): Project {
		$this->eventBridgeAwsRegion = $eventBridgeAwsRegion;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return Project $this
	 */
	public function withCreatedAt(?int $createdAt): Project {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return Project $this
	 */
	public function withUpdatedAt(?int $updatedAt): Project {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "projectId" => $this->projectId,
            "accountName" => $this->accountName,
            "name" => $this->name,
            "description" => $this->description,
            "plan" => $this->plan,
            "billingMethodName" => $this->billingMethodName,
            "enableEventBridge" => $this->enableEventBridge,
            "eventBridgeAwsAccountId" => $this->eventBridgeAwsAccountId,
            "eventBridgeAwsRegion" => $this->eventBridgeAwsRegion,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Project {
        $model = new Project();
        $model->setProjectId(isset($data["projectId"]) ? $data["projectId"] : null);
        $model->setAccountName(isset($data["accountName"]) ? $data["accountName"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setPlan(isset($data["plan"]) ? $data["plan"] : null);
        $model->setBillingMethodName(isset($data["billingMethodName"]) ? $data["billingMethodName"] : null);
        $model->setEnableEventBridge(isset($data["enableEventBridge"]) ? $data["enableEventBridge"] : null);
        $model->setEventBridgeAwsAccountId(isset($data["eventBridgeAwsAccountId"]) ? $data["eventBridgeAwsAccountId"] : null);
        $model->setEventBridgeAwsRegion(isset($data["eventBridgeAwsRegion"]) ? $data["eventBridgeAwsRegion"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}