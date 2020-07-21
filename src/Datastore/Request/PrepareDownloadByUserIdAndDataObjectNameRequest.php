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

namespace Gs2\Datastore\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * ユーザIDとオブジェクト名を指定してデータオブジェクトをダウンロード準備する のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class PrepareDownloadByUserIdAndDataObjectNameRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザIDとオブジェクト名を指定してデータオブジェクトをダウンロード準備する
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDとオブジェクト名を指定してデータオブジェクトをダウンロード準備する
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDとオブジェクト名を指定してデータオブジェクトをダウンロード準備する
     * @return PrepareDownloadByUserIdAndDataObjectNameRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): PrepareDownloadByUserIdAndDataObjectNameRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザIDとオブジェクト名を指定してデータオブジェクトをダウンロード準備する
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDとオブジェクト名を指定してデータオブジェクトをダウンロード準備する
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDとオブジェクト名を指定してデータオブジェクトをダウンロード準備する
     * @return PrepareDownloadByUserIdAndDataObjectNameRequest $this
     */
    public function withUserId(string $userId = null): PrepareDownloadByUserIdAndDataObjectNameRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string データの名前 */
    private $dataObjectName;

    /**
     * データの名前を取得
     *
     * @return string|null ユーザIDとオブジェクト名を指定してデータオブジェクトをダウンロード準備する
     */
    public function getDataObjectName(): ?string {
        return $this->dataObjectName;
    }

    /**
     * データの名前を設定
     *
     * @param string $dataObjectName ユーザIDとオブジェクト名を指定してデータオブジェクトをダウンロード準備する
     */
    public function setDataObjectName(string $dataObjectName = null) {
        $this->dataObjectName = $dataObjectName;
    }

    /**
     * データの名前を設定
     *
     * @param string $dataObjectName ユーザIDとオブジェクト名を指定してデータオブジェクトをダウンロード準備する
     * @return PrepareDownloadByUserIdAndDataObjectNameRequest $this
     */
    public function withDataObjectName(string $dataObjectName = null): PrepareDownloadByUserIdAndDataObjectNameRequest {
        $this->setDataObjectName($dataObjectName);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDとオブジェクト名を指定してデータオブジェクトをダウンロード準備する
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDとオブジェクト名を指定してデータオブジェクトをダウンロード準備する
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDとオブジェクト名を指定してデータオブジェクトをダウンロード準備する
     * @return PrepareDownloadByUserIdAndDataObjectNameRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): PrepareDownloadByUserIdAndDataObjectNameRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}