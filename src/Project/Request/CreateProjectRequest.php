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

namespace Gs2\Project\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * プロジェクトを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateProjectRequest extends Gs2BasicRequest {

    /** @var string GS2アカウントトークン */
    private $accountToken;

    /**
     * GS2アカウントトークンを取得
     *
     * @return string|null プロジェクトを新規作成
     */
    public function getAccountToken(): ?string {
        return $this->accountToken;
    }

    /**
     * GS2アカウントトークンを設定
     *
     * @param string $accountToken プロジェクトを新規作成
     */
    public function setAccountToken(string $accountToken = null) {
        $this->accountToken = $accountToken;
    }

    /**
     * GS2アカウントトークンを設定
     *
     * @param string $accountToken プロジェクトを新規作成
     * @return CreateProjectRequest $this
     */
    public function withAccountToken(string $accountToken = null): CreateProjectRequest {
        $this->setAccountToken($accountToken);
        return $this;
    }

    /** @var string プロジェクト名 */
    private $name;

    /**
     * プロジェクト名を取得
     *
     * @return string|null プロジェクトを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * プロジェクト名を設定
     *
     * @param string $name プロジェクトを新規作成
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * プロジェクト名を設定
     *
     * @param string $name プロジェクトを新規作成
     * @return CreateProjectRequest $this
     */
    public function withName(string $name = null): CreateProjectRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string プロジェクトの説明 */
    private $description;

    /**
     * プロジェクトの説明を取得
     *
     * @return string|null プロジェクトを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * プロジェクトの説明を設定
     *
     * @param string $description プロジェクトを新規作成
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * プロジェクトの説明を設定
     *
     * @param string $description プロジェクトを新規作成
     * @return CreateProjectRequest $this
     */
    public function withDescription(string $description = null): CreateProjectRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string 契約プラン */
    private $plan;

    /**
     * 契約プランを取得
     *
     * @return string|null プロジェクトを新規作成
     */
    public function getPlan(): ?string {
        return $this->plan;
    }

    /**
     * 契約プランを設定
     *
     * @param string $plan プロジェクトを新規作成
     */
    public function setPlan(string $plan = null) {
        $this->plan = $plan;
    }

    /**
     * 契約プランを設定
     *
     * @param string $plan プロジェクトを新規作成
     * @return CreateProjectRequest $this
     */
    public function withPlan(string $plan = null): CreateProjectRequest {
        $this->setPlan($plan);
        return $this;
    }

    /** @var string 支払い方法名 */
    private $billingMethodName;

    /**
     * 支払い方法名を取得
     *
     * @return string|null プロジェクトを新規作成
     */
    public function getBillingMethodName(): ?string {
        return $this->billingMethodName;
    }

    /**
     * 支払い方法名を設定
     *
     * @param string $billingMethodName プロジェクトを新規作成
     */
    public function setBillingMethodName(string $billingMethodName = null) {
        $this->billingMethodName = $billingMethodName;
    }

    /**
     * 支払い方法名を設定
     *
     * @param string $billingMethodName プロジェクトを新規作成
     * @return CreateProjectRequest $this
     */
    public function withBillingMethodName(string $billingMethodName = null): CreateProjectRequest {
        $this->setBillingMethodName($billingMethodName);
        return $this;
    }

    /** @var string AWS EventBridge の設定 */
    private $enableEventBridge;

    /**
     * AWS EventBridge の設定を取得
     *
     * @return string|null プロジェクトを新規作成
     */
    public function getEnableEventBridge(): ?string {
        return $this->enableEventBridge;
    }

    /**
     * AWS EventBridge の設定を設定
     *
     * @param string $enableEventBridge プロジェクトを新規作成
     */
    public function setEnableEventBridge(string $enableEventBridge = null) {
        $this->enableEventBridge = $enableEventBridge;
    }

    /**
     * AWS EventBridge の設定を設定
     *
     * @param string $enableEventBridge プロジェクトを新規作成
     * @return CreateProjectRequest $this
     */
    public function withEnableEventBridge(string $enableEventBridge = null): CreateProjectRequest {
        $this->setEnableEventBridge($enableEventBridge);
        return $this;
    }

    /** @var string 通知に使用するAWSアカウントのID */
    private $eventBridgeAwsAccountId;

    /**
     * 通知に使用するAWSアカウントのIDを取得
     *
     * @return string|null プロジェクトを新規作成
     */
    public function getEventBridgeAwsAccountId(): ?string {
        return $this->eventBridgeAwsAccountId;
    }

    /**
     * 通知に使用するAWSアカウントのIDを設定
     *
     * @param string $eventBridgeAwsAccountId プロジェクトを新規作成
     */
    public function setEventBridgeAwsAccountId(string $eventBridgeAwsAccountId = null) {
        $this->eventBridgeAwsAccountId = $eventBridgeAwsAccountId;
    }

    /**
     * 通知に使用するAWSアカウントのIDを設定
     *
     * @param string $eventBridgeAwsAccountId プロジェクトを新規作成
     * @return CreateProjectRequest $this
     */
    public function withEventBridgeAwsAccountId(string $eventBridgeAwsAccountId = null): CreateProjectRequest {
        $this->setEventBridgeAwsAccountId($eventBridgeAwsAccountId);
        return $this;
    }

    /** @var string 通知に使用するAWSリージョン */
    private $eventBridgeAwsRegion;

    /**
     * 通知に使用するAWSリージョンを取得
     *
     * @return string|null プロジェクトを新規作成
     */
    public function getEventBridgeAwsRegion(): ?string {
        return $this->eventBridgeAwsRegion;
    }

    /**
     * 通知に使用するAWSリージョンを設定
     *
     * @param string $eventBridgeAwsRegion プロジェクトを新規作成
     */
    public function setEventBridgeAwsRegion(string $eventBridgeAwsRegion = null) {
        $this->eventBridgeAwsRegion = $eventBridgeAwsRegion;
    }

    /**
     * 通知に使用するAWSリージョンを設定
     *
     * @param string $eventBridgeAwsRegion プロジェクトを新規作成
     * @return CreateProjectRequest $this
     */
    public function withEventBridgeAwsRegion(string $eventBridgeAwsRegion = null): CreateProjectRequest {
        $this->setEventBridgeAwsRegion($eventBridgeAwsRegion);
        return $this;
    }

}