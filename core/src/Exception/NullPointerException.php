<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Core\Exception;

use Gs2\Core\Model\RequestError;

/**
 * Nullポインタアクセスを表現するクラス
 * 
 * @author Game Server Services, inc. <contact@gs2.io>
 * @copyright Game Server Services, Inc.
 *
 */
class NullPointerException extends Gs2ClientException {

    /**
     * コンストラクタ
     *
     * @param array $errors エラーリスト
     */
    function __construct($errors) {
        if(is_null($errors)) {
            $errors = [];
        }
        parent::__construct(json_encode($errors));
    }

    /**
     * エラーリストを取得する
     *
     * @return RequestError[] エラーリスト
     */
    function getErrors(): array {
        return $this->errors;
    }
}