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

namespace Gs2\Formation\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Formation\Model\AcquireAction;
use Gs2\Formation\Model\AcquireActionConfig;

/**
 * 署名付きスロットを使ってフォームを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class AcquireActionsToFormPropertiesRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 署名付きスロットを使ってフォームを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 署名付きスロットを使ってフォームを更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 署名付きスロットを使ってフォームを更新
     * @return AcquireActionsToFormPropertiesRequest $this
     */
    public function withNamespaceName(string $namespaceName): AcquireActionsToFormPropertiesRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null 署名付きスロットを使ってフォームを更新
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId 署名付きスロットを使ってフォームを更新
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId 署名付きスロットを使ってフォームを更新
     * @return AcquireActionsToFormPropertiesRequest $this
     */
    public function withUserId(string $userId): AcquireActionsToFormPropertiesRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string フォームの保存領域の名前 */
    private $moldName;

    /**
     * フォームの保存領域の名前を取得
     *
     * @return string|null 署名付きスロットを使ってフォームを更新
     */
    public function getMoldName(): ?string {
        return $this->moldName;
    }

    /**
     * フォームの保存領域の名前を設定
     *
     * @param string $moldName 署名付きスロットを使ってフォームを更新
     */
    public function setMoldName(string $moldName) {
        $this->moldName = $moldName;
    }

    /**
     * フォームの保存領域の名前を設定
     *
     * @param string $moldName 署名付きスロットを使ってフォームを更新
     * @return AcquireActionsToFormPropertiesRequest $this
     */
    public function withMoldName(string $moldName): AcquireActionsToFormPropertiesRequest {
        $this->setMoldName($moldName);
        return $this;
    }

    /** @var int 保存領域のインデックス */
    private $index;

    /**
     * 保存領域のインデックスを取得
     *
     * @return int|null 署名付きスロットを使ってフォームを更新
     */
    public function getIndex(): ?int {
        return $this->index;
    }

    /**
     * 保存領域のインデックスを設定
     *
     * @param int $index 署名付きスロットを使ってフォームを更新
     */
    public function setIndex(int $index) {
        $this->index = $index;
    }

    /**
     * 保存領域のインデックスを設定
     *
     * @param int $index 署名付きスロットを使ってフォームを更新
     * @return AcquireActionsToFormPropertiesRequest $this
     */
    public function withIndex(int $index): AcquireActionsToFormPropertiesRequest {
        $this->setIndex($index);
        return $this;
    }

    /** @var AcquireAction フォームのプロパティに適用する入手アクション */
    private $acquireAction;

    /**
     * フォームのプロパティに適用する入手アクションを取得
     *
     * @return AcquireAction|null 署名付きスロットを使ってフォームを更新
     */
    public function getAcquireAction(): ?AcquireAction {
        return $this->acquireAction;
    }

    /**
     * フォームのプロパティに適用する入手アクションを設定
     *
     * @param AcquireAction $acquireAction 署名付きスロットを使ってフォームを更新
     */
    public function setAcquireAction(AcquireAction $acquireAction) {
        $this->acquireAction = $acquireAction;
    }

    /**
     * フォームのプロパティに適用する入手アクションを設定
     *
     * @param AcquireAction $acquireAction 署名付きスロットを使ってフォームを更新
     * @return AcquireActionsToFormPropertiesRequest $this
     */
    public function withAcquireAction(AcquireAction $acquireAction): AcquireActionsToFormPropertiesRequest {
        $this->setAcquireAction($acquireAction);
        return $this;
    }

    /** @var string 入手処理を登録する GS2-JobQueue のネームスペース のGRN */
    private $queueNamespaceId;

    /**
     * 入手処理を登録する GS2-JobQueue のネームスペース のGRNを取得
     *
     * @return string|null 署名付きスロットを使ってフォームを更新
     */
    public function getQueueNamespaceId(): ?string {
        return $this->queueNamespaceId;
    }

    /**
     * 入手処理を登録する GS2-JobQueue のネームスペース のGRNを設定
     *
     * @param string $queueNamespaceId 署名付きスロットを使ってフォームを更新
     */
    public function setQueueNamespaceId(string $queueNamespaceId) {
        $this->queueNamespaceId = $queueNamespaceId;
    }

    /**
     * 入手処理を登録する GS2-JobQueue のネームスペース のGRNを設定
     *
     * @param string $queueNamespaceId 署名付きスロットを使ってフォームを更新
     * @return AcquireActionsToFormPropertiesRequest $this
     */
    public function withQueueNamespaceId(string $queueNamespaceId): AcquireActionsToFormPropertiesRequest {
        $this->setQueueNamespaceId($queueNamespaceId);
        return $this;
    }

    /** @var string スタンプシートの発行に使用する GS2-Key の暗号鍵 のGRN */
    private $keyId;

    /**
     * スタンプシートの発行に使用する GS2-Key の暗号鍵 のGRNを取得
     *
     * @return string|null 署名付きスロットを使ってフォームを更新
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * スタンプシートの発行に使用する GS2-Key の暗号鍵 のGRNを設定
     *
     * @param string $keyId 署名付きスロットを使ってフォームを更新
     */
    public function setKeyId(string $keyId) {
        $this->keyId = $keyId;
    }

    /**
     * スタンプシートの発行に使用する GS2-Key の暗号鍵 のGRNを設定
     *
     * @param string $keyId 署名付きスロットを使ってフォームを更新
     * @return AcquireActionsToFormPropertiesRequest $this
     */
    public function withKeyId(string $keyId): AcquireActionsToFormPropertiesRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var AcquireActionConfig[] 入手アクションに適用するコンフィグ */
    private $config;

    /**
     * 入手アクションに適用するコンフィグを取得
     *
     * @return AcquireActionConfig[]|null 署名付きスロットを使ってフォームを更新
     */
    public function getConfig(): ?array {
        return $this->config;
    }

    /**
     * 入手アクションに適用するコンフィグを設定
     *
     * @param AcquireActionConfig[] $config 署名付きスロットを使ってフォームを更新
     */
    public function setConfig(array $config) {
        $this->config = $config;
    }

    /**
     * 入手アクションに適用するコンフィグを設定
     *
     * @param AcquireActionConfig[] $config 署名付きスロットを使ってフォームを更新
     * @return AcquireActionsToFormPropertiesRequest $this
     */
    public function withConfig(array $config): AcquireActionsToFormPropertiesRequest {
        $this->setConfig($config);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 署名付きスロットを使ってフォームを更新
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 署名付きスロットを使ってフォームを更新
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 署名付きスロットを使ってフォームを更新
     * @return AcquireActionsToFormPropertiesRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): AcquireActionsToFormPropertiesRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}