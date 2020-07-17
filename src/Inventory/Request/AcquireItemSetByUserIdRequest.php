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

namespace Gs2\Inventory\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * アイテムをインベントリに追加 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class AcquireItemSetByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null アイテムをインベントリに追加
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName アイテムをインベントリに追加
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName アイテムをインベントリに追加
     * @return AcquireItemSetByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): AcquireItemSetByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string インベントリの種類名 */
    private $inventoryName;

    /**
     * インベントリの種類名を取得
     *
     * @return string|null アイテムをインベントリに追加
     */
    public function getInventoryName(): ?string {
        return $this->inventoryName;
    }

    /**
     * インベントリの種類名を設定
     *
     * @param string $inventoryName アイテムをインベントリに追加
     */
    public function setInventoryName(string $inventoryName = null) {
        $this->inventoryName = $inventoryName;
    }

    /**
     * インベントリの種類名を設定
     *
     * @param string $inventoryName アイテムをインベントリに追加
     * @return AcquireItemSetByUserIdRequest $this
     */
    public function withInventoryName(string $inventoryName = null): AcquireItemSetByUserIdRequest {
        $this->setInventoryName($inventoryName);
        return $this;
    }

    /** @var string アイテムマスターの名前 */
    private $itemName;

    /**
     * アイテムマスターの名前を取得
     *
     * @return string|null アイテムをインベントリに追加
     */
    public function getItemName(): ?string {
        return $this->itemName;
    }

    /**
     * アイテムマスターの名前を設定
     *
     * @param string $itemName アイテムをインベントリに追加
     */
    public function setItemName(string $itemName = null) {
        $this->itemName = $itemName;
    }

    /**
     * アイテムマスターの名前を設定
     *
     * @param string $itemName アイテムをインベントリに追加
     * @return AcquireItemSetByUserIdRequest $this
     */
    public function withItemName(string $itemName = null): AcquireItemSetByUserIdRequest {
        $this->setItemName($itemName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null アイテムをインベントリに追加
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId アイテムをインベントリに追加
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId アイテムをインベントリに追加
     * @return AcquireItemSetByUserIdRequest $this
     */
    public function withUserId(string $userId = null): AcquireItemSetByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var int 入手する量 */
    private $acquireCount;

    /**
     * 入手する量を取得
     *
     * @return int|null アイテムをインベントリに追加
     */
    public function getAcquireCount(): ?int {
        return $this->acquireCount;
    }

    /**
     * 入手する量を設定
     *
     * @param int $acquireCount アイテムをインベントリに追加
     */
    public function setAcquireCount(int $acquireCount = null) {
        $this->acquireCount = $acquireCount;
    }

    /**
     * 入手する量を設定
     *
     * @param int $acquireCount アイテムをインベントリに追加
     * @return AcquireItemSetByUserIdRequest $this
     */
    public function withAcquireCount(int $acquireCount = null): AcquireItemSetByUserIdRequest {
        $this->setAcquireCount($acquireCount);
        return $this;
    }

    /** @var int 有効期限 */
    private $expiresAt;

    /**
     * 有効期限を取得
     *
     * @return int|null アイテムをインベントリに追加
     */
    public function getExpiresAt(): ?int {
        return $this->expiresAt;
    }

    /**
     * 有効期限を設定
     *
     * @param int $expiresAt アイテムをインベントリに追加
     */
    public function setExpiresAt(int $expiresAt = null) {
        $this->expiresAt = $expiresAt;
    }

    /**
     * 有効期限を設定
     *
     * @param int $expiresAt アイテムをインベントリに追加
     * @return AcquireItemSetByUserIdRequest $this
     */
    public function withExpiresAt(int $expiresAt = null): AcquireItemSetByUserIdRequest {
        $this->setExpiresAt($expiresAt);
        return $this;
    }

    /** @var bool 既存の ItemSet に空きがあったとしても、新しい ItemSet を作成するか */
    private $createNewItemSet;

    /**
     * 既存の ItemSet に空きがあったとしても、新しい ItemSet を作成するかを取得
     *
     * @return bool|null アイテムをインベントリに追加
     */
    public function getCreateNewItemSet(): ?bool {
        return $this->createNewItemSet;
    }

    /**
     * 既存の ItemSet に空きがあったとしても、新しい ItemSet を作成するかを設定
     *
     * @param bool $createNewItemSet アイテムをインベントリに追加
     */
    public function setCreateNewItemSet(bool $createNewItemSet = null) {
        $this->createNewItemSet = $createNewItemSet;
    }

    /**
     * 既存の ItemSet に空きがあったとしても、新しい ItemSet を作成するかを設定
     *
     * @param bool $createNewItemSet アイテムをインベントリに追加
     * @return AcquireItemSetByUserIdRequest $this
     */
    public function withCreateNewItemSet(bool $createNewItemSet = null): AcquireItemSetByUserIdRequest {
        $this->setCreateNewItemSet($createNewItemSet);
        return $this;
    }

    /** @var string 追加先のアイテムセットの名前 */
    private $itemSetName;

    /**
     * 追加先のアイテムセットの名前を取得
     *
     * @return string|null アイテムをインベントリに追加
     */
    public function getItemSetName(): ?string {
        return $this->itemSetName;
    }

    /**
     * 追加先のアイテムセットの名前を設定
     *
     * @param string $itemSetName アイテムをインベントリに追加
     */
    public function setItemSetName(string $itemSetName = null) {
        $this->itemSetName = $itemSetName;
    }

    /**
     * 追加先のアイテムセットの名前を設定
     *
     * @param string $itemSetName アイテムをインベントリに追加
     * @return AcquireItemSetByUserIdRequest $this
     */
    public function withItemSetName(string $itemSetName = null): AcquireItemSetByUserIdRequest {
        $this->setItemSetName($itemSetName);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null アイテムをインベントリに追加
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider アイテムをインベントリに追加
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider アイテムをインベントリに追加
     * @return AcquireItemSetByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): AcquireItemSetByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}