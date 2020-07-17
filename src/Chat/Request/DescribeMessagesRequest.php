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

namespace Gs2\Chat\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * メッセージの一覧取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeMessagesRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null メッセージの一覧取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName メッセージの一覧取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName メッセージの一覧取得
     * @return DescribeMessagesRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): DescribeMessagesRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ルーム名 */
    private $roomName;

    /**
     * ルーム名を取得
     *
     * @return string|null メッセージの一覧取得
     */
    public function getRoomName(): ?string {
        return $this->roomName;
    }

    /**
     * ルーム名を設定
     *
     * @param string $roomName メッセージの一覧取得
     */
    public function setRoomName(string $roomName = null) {
        $this->roomName = $roomName;
    }

    /**
     * ルーム名を設定
     *
     * @param string $roomName メッセージの一覧取得
     * @return DescribeMessagesRequest $this
     */
    public function withRoomName(string $roomName = null): DescribeMessagesRequest {
        $this->setRoomName($roomName);
        return $this;
    }

    /** @var string メッセージを投稿するために必要となるパスワード */
    private $password;

    /**
     * メッセージを投稿するために必要となるパスワードを取得
     *
     * @return string|null メッセージの一覧取得
     */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * メッセージを投稿するために必要となるパスワードを設定
     *
     * @param string $password メッセージの一覧取得
     */
    public function setPassword(string $password = null) {
        $this->password = $password;
    }

    /**
     * メッセージを投稿するために必要となるパスワードを設定
     *
     * @param string $password メッセージの一覧取得
     * @return DescribeMessagesRequest $this
     */
    public function withPassword(string $password = null): DescribeMessagesRequest {
        $this->setPassword($password);
        return $this;
    }

    /** @var int メッセージの取得を開始する時間 */
    private $startAt;

    /**
     * メッセージの取得を開始する時間を取得
     *
     * @return int|null メッセージの一覧取得
     */
    public function getStartAt(): ?int {
        return $this->startAt;
    }

    /**
     * メッセージの取得を開始する時間を設定
     *
     * @param int $startAt メッセージの一覧取得
     */
    public function setStartAt(int $startAt = null) {
        $this->startAt = $startAt;
    }

    /**
     * メッセージの取得を開始する時間を設定
     *
     * @param int $startAt メッセージの一覧取得
     * @return DescribeMessagesRequest $this
     */
    public function withStartAt(int $startAt = null): DescribeMessagesRequest {
        $this->setStartAt($startAt);
        return $this;
    }

    /** @var int データの取得件数 */
    private $limit;

    /**
     * データの取得件数を取得
     *
     * @return int|null メッセージの一覧取得
     */
    public function getLimit(): ?int {
        return $this->limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit メッセージの一覧取得
     */
    public function setLimit(int $limit = null) {
        $this->limit = $limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit メッセージの一覧取得
     * @return DescribeMessagesRequest $this
     */
    public function withLimit(int $limit = null): DescribeMessagesRequest {
        $this->setLimit($limit);
        return $this;
    }

}