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

namespace Gs2\Matchmaking\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Matchmaking\Model\AttributeRange;

/**
 * ギャザリングを更新する のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateGatheringByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ギャザリングを更新する
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ギャザリングを更新する
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ギャザリングを更新する
     * @return UpdateGatheringByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): UpdateGatheringByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ギャザリング名 */
    private $gatheringName;

    /**
     * ギャザリング名を取得
     *
     * @return string|null ギャザリングを更新する
     */
    public function getGatheringName(): ?string {
        return $this->gatheringName;
    }

    /**
     * ギャザリング名を設定
     *
     * @param string $gatheringName ギャザリングを更新する
     */
    public function setGatheringName(string $gatheringName) {
        $this->gatheringName = $gatheringName;
    }

    /**
     * ギャザリング名を設定
     *
     * @param string $gatheringName ギャザリングを更新する
     * @return UpdateGatheringByUserIdRequest $this
     */
    public function withGatheringName(string $gatheringName): UpdateGatheringByUserIdRequest {
        $this->setGatheringName($gatheringName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ギャザリングを更新する
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ギャザリングを更新する
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ギャザリングを更新する
     * @return UpdateGatheringByUserIdRequest $this
     */
    public function withUserId(string $userId): UpdateGatheringByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var AttributeRange[] 募集条件 */
    private $attributeRanges;

    /**
     * 募集条件を取得
     *
     * @return AttributeRange[]|null ギャザリングを更新する
     */
    public function getAttributeRanges(): ?array {
        return $this->attributeRanges;
    }

    /**
     * 募集条件を設定
     *
     * @param AttributeRange[] $attributeRanges ギャザリングを更新する
     */
    public function setAttributeRanges(array $attributeRanges) {
        $this->attributeRanges = $attributeRanges;
    }

    /**
     * 募集条件を設定
     *
     * @param AttributeRange[] $attributeRanges ギャザリングを更新する
     * @return UpdateGatheringByUserIdRequest $this
     */
    public function withAttributeRanges(array $attributeRanges): UpdateGatheringByUserIdRequest {
        $this->setAttributeRanges($attributeRanges);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ギャザリングを更新する
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ギャザリングを更新する
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ギャザリングを更新する
     * @return UpdateGatheringByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): UpdateGatheringByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}