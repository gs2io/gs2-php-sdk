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
use Gs2\Formation\Model\Slot;

/**
 * ユーザIDを指定してフォームを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class SetFormByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザIDを指定してフォームを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してフォームを更新
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してフォームを更新
     * @return SetFormByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): SetFormByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザIDを指定してフォームを更新
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してフォームを更新
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してフォームを更新
     * @return SetFormByUserIdRequest $this
     */
    public function withUserId(string $userId = null): SetFormByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string フォームの保存領域の名前 */
    private $moldName;

    /**
     * フォームの保存領域の名前を取得
     *
     * @return string|null ユーザIDを指定してフォームを更新
     */
    public function getMoldName(): ?string {
        return $this->moldName;
    }

    /**
     * フォームの保存領域の名前を設定
     *
     * @param string $moldName ユーザIDを指定してフォームを更新
     */
    public function setMoldName(string $moldName = null) {
        $this->moldName = $moldName;
    }

    /**
     * フォームの保存領域の名前を設定
     *
     * @param string $moldName ユーザIDを指定してフォームを更新
     * @return SetFormByUserIdRequest $this
     */
    public function withMoldName(string $moldName = null): SetFormByUserIdRequest {
        $this->setMoldName($moldName);
        return $this;
    }

    /** @var int 保存領域のインデックス */
    private $index;

    /**
     * 保存領域のインデックスを取得
     *
     * @return int|null ユーザIDを指定してフォームを更新
     */
    public function getIndex(): ?int {
        return $this->index;
    }

    /**
     * 保存領域のインデックスを設定
     *
     * @param int $index ユーザIDを指定してフォームを更新
     */
    public function setIndex(int $index = null) {
        $this->index = $index;
    }

    /**
     * 保存領域のインデックスを設定
     *
     * @param int $index ユーザIDを指定してフォームを更新
     * @return SetFormByUserIdRequest $this
     */
    public function withIndex(int $index = null): SetFormByUserIdRequest {
        $this->setIndex($index);
        return $this;
    }

    /** @var Slot[] スロットリスト */
    private $slots;

    /**
     * スロットリストを取得
     *
     * @return Slot[]|null ユーザIDを指定してフォームを更新
     */
    public function getSlots(): ?array {
        return $this->slots;
    }

    /**
     * スロットリストを設定
     *
     * @param Slot[] $slots ユーザIDを指定してフォームを更新
     */
    public function setSlots(array $slots = null) {
        $this->slots = $slots;
    }

    /**
     * スロットリストを設定
     *
     * @param Slot[] $slots ユーザIDを指定してフォームを更新
     * @return SetFormByUserIdRequest $this
     */
    public function withSlots(array $slots = null): SetFormByUserIdRequest {
        $this->setSlots($slots);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDを指定してフォームを更新
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してフォームを更新
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してフォームを更新
     * @return SetFormByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): SetFormByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}