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
use Gs2\Matchmaking\Model\Player;
use Gs2\Matchmaking\Model\AttributeRange;
use Gs2\Matchmaking\Model\CapacityOfRole;

/**
 * ギャザリングを作成して募集を開始 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateGatheringRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ギャザリングを作成して募集を開始
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ギャザリングを作成して募集を開始
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ギャザリングを作成して募集を開始
     * @return CreateGatheringRequest $this
     */
    public function withNamespaceName(string $namespaceName): CreateGatheringRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var Player 自身のプレイヤー情報 */
    private $player;

    /**
     * 自身のプレイヤー情報を取得
     *
     * @return Player|null ギャザリングを作成して募集を開始
     */
    public function getPlayer(): ?Player {
        return $this->player;
    }

    /**
     * 自身のプレイヤー情報を設定
     *
     * @param Player $player ギャザリングを作成して募集を開始
     */
    public function setPlayer(Player $player) {
        $this->player = $player;
    }

    /**
     * 自身のプレイヤー情報を設定
     *
     * @param Player $player ギャザリングを作成して募集を開始
     * @return CreateGatheringRequest $this
     */
    public function withPlayer(Player $player): CreateGatheringRequest {
        $this->setPlayer($player);
        return $this;
    }

    /** @var AttributeRange[] 募集条件 */
    private $attributeRanges;

    /**
     * 募集条件を取得
     *
     * @return AttributeRange[]|null ギャザリングを作成して募集を開始
     */
    public function getAttributeRanges(): ?array {
        return $this->attributeRanges;
    }

    /**
     * 募集条件を設定
     *
     * @param AttributeRange[] $attributeRanges ギャザリングを作成して募集を開始
     */
    public function setAttributeRanges(array $attributeRanges) {
        $this->attributeRanges = $attributeRanges;
    }

    /**
     * 募集条件を設定
     *
     * @param AttributeRange[] $attributeRanges ギャザリングを作成して募集を開始
     * @return CreateGatheringRequest $this
     */
    public function withAttributeRanges(array $attributeRanges): CreateGatheringRequest {
        $this->setAttributeRanges($attributeRanges);
        return $this;
    }

    /** @var CapacityOfRole[] 参加者 */
    private $capacityOfRoles;

    /**
     * 参加者を取得
     *
     * @return CapacityOfRole[]|null ギャザリングを作成して募集を開始
     */
    public function getCapacityOfRoles(): ?array {
        return $this->capacityOfRoles;
    }

    /**
     * 参加者を設定
     *
     * @param CapacityOfRole[] $capacityOfRoles ギャザリングを作成して募集を開始
     */
    public function setCapacityOfRoles(array $capacityOfRoles) {
        $this->capacityOfRoles = $capacityOfRoles;
    }

    /**
     * 参加者を設定
     *
     * @param CapacityOfRole[] $capacityOfRoles ギャザリングを作成して募集を開始
     * @return CreateGatheringRequest $this
     */
    public function withCapacityOfRoles(array $capacityOfRoles): CreateGatheringRequest {
        $this->setCapacityOfRoles($capacityOfRoles);
        return $this;
    }

    /** @var string[] 参加を許可するユーザIDリスト */
    private $allowUserIds;

    /**
     * 参加を許可するユーザIDリストを取得
     *
     * @return string[]|null ギャザリングを作成して募集を開始
     */
    public function getAllowUserIds(): ?array {
        return $this->allowUserIds;
    }

    /**
     * 参加を許可するユーザIDリストを設定
     *
     * @param string[] $allowUserIds ギャザリングを作成して募集を開始
     */
    public function setAllowUserIds(array $allowUserIds) {
        $this->allowUserIds = $allowUserIds;
    }

    /**
     * 参加を許可するユーザIDリストを設定
     *
     * @param string[] $allowUserIds ギャザリングを作成して募集を開始
     * @return CreateGatheringRequest $this
     */
    public function withAllowUserIds(array $allowUserIds): CreateGatheringRequest {
        $this->setAllowUserIds($allowUserIds);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ギャザリングを作成して募集を開始
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ギャザリングを作成して募集を開始
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ギャザリングを作成して募集を開始
     * @return CreateGatheringRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): CreateGatheringRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

    /** @var string アクセストークン */
    private $accessToken;

    /**
     * アクセストークンを取得
     *
     * @return string アクセストークン
     */
    public function getAccessToken(): string {
        return $this->accessToken;
    }

    /**
     * アクセストークンを設定
     *
     * @param string $accessToken アクセストークン
     */
    public function setAccessToken(string $accessToken) {
        $this->accessToken = $accessToken;
    }

    /**
     * アクセストークンを設定
     *
     * @param string $accessToken アクセストークン
     * @return CreateGatheringRequest this
     */
    public function withAccessToken(string $accessToken): CreateGatheringRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}